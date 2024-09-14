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
            return view('admin.quiz.edit')->with([
                'quiz' => $existing,
                'message' => $message,
            ]);
        }
        $quizData = [
            'message_id' => $message->id,
            'published' => $request->published??false,
        ];
        $quiz = Quiz::create($quizData);

        return view('admin.quiz.edit')->with([
            'quiz' => $quiz,
            'message' => $message,
        ]);
    }
    public function store(Request $request)
    {
        $quizData = [
            'message_id' => $request->message_id,
            'published' => $request->published==='on',
            'max_questions' => $request->max_questions??20,
        ];

        if ($request->filled('start_date') && strtotime($request->start_date)) {
            $quizData['start_date'] = $request->start_date;
        }

        if ($request->filled('deadline') && strtotime($request->deadline)) {
            $quizData['deadline'] = $request->deadline;
        }
        $quiz = Quiz::create($quizData);

        return redirect()->route('admin.quiz.index')->with('message', 'Quiz created successfully!');
    }

    public function edit(Quiz $quiz): View
    {
        return view('admin.quiz.edit')->with([
            'quiz' => $quiz,
            'message' => $quiz->message,
        ]);
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'max_questions' => 'required|integer|min:0|max:100',
        ]);

        $quiz->published = $request->published==='on';
        $quiz->max_questions = $request->max_questions;

        if ($request->filled('start_date') && strtotime($request->start_date)) {
            $quiz->start_date = $request->start_date;
        }

        if ($request->filled('deadline') && strtotime($request->deadline)) {
            $quiz->deadline = $request->deadline;
        }

        $quiz->save();

        return redirect()->route('admin.messages.index')->with('message', 'Quiz updated successfully!');
    }

}
