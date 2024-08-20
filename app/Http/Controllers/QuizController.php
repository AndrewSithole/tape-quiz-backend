<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // In your QuizController
    public function index(Request $request)
    {
        $query = Quiz::query();

        if (!empty($request->input('search'))) {
            // Search for quizzes by title or code of the message they belong to
            $query->whereHas('message', function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->input('search') . '%')
                    ->orWhere('code', 'like', '%' . $request->input('search') . '%');
            });
        }
        $quiz = $query->with(['message:id,title,code'])->paginate(10);
        return view('admin.quiz.index', compact('quiz'));
    }
    // In your QuizController
    public function create(Message $message): View
    {
        $existing = $message->quizzes->first();
        if($existing) {
            return view('admin.quiz.create', compact('message'));
        }
        return view('admin.quiz.create', compact('message'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'deadline' => 'required|date|after_or_equal:start_date',
            'published' => 'required|boolean',
            'questions' => 'required|array|min:1',
            'questions.*.text' => 'required|string',
            'questions.*.correctAnswer' => 'required|string',
            'questions.*.options' => 'required|array|min:4',
            'questions.*.options.*' => 'required|string',
        ]);

        $quiz = Quiz::create([
            'message_id' => $request->message_id,
            'published' => $request->published,
            'start_date' => $request->start_date,
            'deadline' => $request->deadline,
        ]);

        foreach ($request->questions as $questionData) {
            $question = $quiz->questions()->create([
                'question_text' => $questionData['text'],
                'correct_answer' => $questionData['correctAnswer'],
            ]);

            foreach ($questionData['options'] as $option) {
                $question->answerOptions()->create(['label' => $option]);
            }
        }

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully!');
    }

}
