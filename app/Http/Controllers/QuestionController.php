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
        $quiz = Quiz::with(['questions.options', 'questions.correctAnswer'])->find($quizId);

        foreach ($quiz->questions as $question){
            $question->correct_answer_order = $question->correctAnswer->order;
        }

        return view('admin.questions.manage')->with([
            'quiz' => $quiz,
            'message' => $quiz->message,
        ]);
    }
    public function store($quizId, Request $request)
    {
        try{
            $data = $request->validate([
                'questions' => 'required|array',
                'questions.*.question_text' => 'required|string',
                'questions.*.correct_answer_order' => 'required|integer|min:0',
                'questions.*.options' => 'required|array|min:1',
                'questions.*.options.*.option_text' => 'required|string',
            ]);
        }catch (\Exception $e){
            return response()->json([
                'message' => 'Invalid data.',
                'errors' => $e->errors()
            ], 422);
        }


        $this->quizQuestionService->storeQuestions($quizId, $data['questions']);

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
