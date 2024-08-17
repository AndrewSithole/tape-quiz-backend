<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Message;
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
    public function create()
    {
        // You can pass a list of sermons to the view for selection in a dropdown
        $sermons = Message::all();
        return view('quizzes.create', compact('sermons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sermon_id' => 'required|exists:sermons,id',
            'due_date' => 'required|date',
        ]);

        $quiz = new Quiz($request->only(['sermon_id', 'due_date']));

        $quiz->save();

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

}
