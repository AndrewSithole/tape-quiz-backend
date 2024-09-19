<?php

namespace App\Services;

use App\Models\Question;
use App\Models\AnswerOption;
use Illuminate\Support\Facades\DB;

class QuizQuestionService
{
    public function storeQuestions($quizId, array $questions)
    {
        // Delete existing questions for the quiz
        Question::where('quiz_id', $quizId)->delete();

        foreach ($questions as $index => $questionData) {
            $this->createQuestion($quizId, $questionData, $index);
        }
    }

    private function createQuestion($quizId, $questionData, $index)
    {
        $question = Question::create([
            'quiz_id' => $quizId,
            'question_text' => $questionData['question_text'],
            'order' => $questionData['order'] ?? $index,
        ]);

        $correctAnswerId = null;
        foreach ($questionData['options'] as $index => $optionData) {
            $answerOption = new AnswerOption([
                'question_id' => $question->id,
                'option_text' => $optionData['option_text'],
                'order' => $optionData['order'] ?? $index,
            ]);
            $answerOption->save();
            if($answerOption->order == $questionData['correct_answer_order']){
                Question::where( 'id', $question->id)->update([
                    'correct_answer_option_id' => $answerOption->id,
                ]);
            }
        }
    }
}

