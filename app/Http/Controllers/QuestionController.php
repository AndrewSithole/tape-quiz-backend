<?php

namespace App\Http\Controllers;

use App\Models\AnswerOption;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function manage(Quiz $quiz)
    {
        return view('admin.questions.manage')->with([
            'quiz' => $quiz,
            'message' => $quiz->message,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string',
            'questions.*.correct_answer' => 'required|in:A,B,C,D',
            'questions.*.options' => 'required|array',
            'questions.*.options.A' => 'required|string',
            'questions.*.options.B' => 'required|string',
            'questions.*.options.C' => 'required|string',
            'questions.*.options.D' => 'required|string',
        ]);

        foreach ($data['questions'] as $questionData) {
            $question = Question::create([
                'quiz_id' => $request->quiz_id, // Adjust as needed
                'question_text' => $questionData['question_text'],
                'correct_answer' => $questionData['correct_answer'],
            ]);

            foreach ($questionData['options'] as $key => $value) {
                AnswerOption::create([
                    'question_id' => $question->id,
                    'label' => $value,
                    'key' => $key, // Adjust schema as needed
                ]);
            }
        }

        return response()->json(['message' => 'Questions saved successfully.']);
    }

    public function index()
    {
        return Question::all();
    }

    public function show($id)
    {
        return Question::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return $question;
    }

    public function destroy($id)
    {
        Question::destroy($id);

        return response()->noContent();
    }
}
