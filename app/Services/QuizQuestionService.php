<?php

namespace App\Services;

use App\Models\Question;
use App\Models\AnswerOption;

class QuizQuestionService
{
    public function storeQuestions($quizId, array $questions)
    {
        Question::where('quiz_id', $quizId)->delete();
        foreach ($questions as $questionData) {
            if (!empty($questionData['id'])) {
                $this->updateQuestion($questionData);
            } else {
                $this->createQuestion($quizId, $questionData);
            }
        }
    }

    private function updateQuestion($questionData)
    {
        $question = Question::findOrFail($questionData['id']);
        $question->update([
            'question_text' => $questionData['question_text'],
            'correct_answer' => $questionData['correct_answer'],
        ]);

        $this->updateAnswerOptions($question, $questionData['options']);
    }

    private function createQuestion($quizId, $questionData)
    {
        $question = Question::create([
            'quiz_id' => $quizId,
            'question_text' => $questionData['question_text'],
            'correct_answer' => $questionData['correct_answer'],
        ]);

        AnswerOption::create([
            'question_id' => $question->id,
            'A' => $questionData['options']['A'],
            'B' => $questionData['options']['B'],
            'C' => $questionData['options']['C'],
            'D' => $questionData['options']['D'],
        ]);
    }

    private function updateAnswerOptions($question, $options)
    {
        foreach ($options as $key => $value) {
            $option = AnswerOption::where('question_id', $question->id)->where('key', $key)->first();
            $option->update(['label' => $value]);
        }
    }
}
