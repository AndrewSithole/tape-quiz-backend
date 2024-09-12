<?php

namespace App\Http\Controllers;

use App\Models\AnswerOption;
use App\Models\Question;
use App\Models\Quiz;
use App\Services\QuizQuestionService;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected QuizQuestionService $quizQuestionService;
    public function __construct(QuizQuestionService $quizQuestionService)
    {
        $this->quizQuestionService = $quizQuestionService;
    }

    public function manage($quizId): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $quiz = Quiz::with(['questions.options'])->findOrFail($quizId);
//        die(json_encode($quiz));
        $transformedQuestions = $quiz->questions->map(function ($question) {
            $options = $question->options;
            return [
                'question_text' => $question->question_text,
                'correct_answer' => $question->correct_answer,
                'options' => [
                    'A' => $question->options->A,
                    'B' => $question->options->B,
                    'C' => $question->options->C,
                    'D' => $question->options->D,
                ],
            ];
        })->toArray();
        return view('admin.questions.manage')->with([
            'quiz' => $quiz,
            'message' => $quiz->message,
        ]);
    }
    public function store($quiz, Request $request)
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

        $this->quizQuestionService->storeQuestions($quiz, $data['questions']);

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
