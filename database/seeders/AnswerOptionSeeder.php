<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionAnswer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerOptionSeeder extends Seeder
{
    public function run()
    {
        $answerOptionsData = [
            [
                'question_id' => 78,
                'options' => [
                    ['option_text' => 'Tempe', 'order' => 0],
                    ['option_text' => 'Alabama', 'order' => 1],
                    ['option_text' => 'Mesa', 'order' => 2],
                    ['option_text' => "I don't know", 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
            [
                'question_id' => 79,
                'options' => [
                    ['option_text' => 'True', 'order' => 0],
                    ['option_text' => 'Maybe', 'order' => 1],
                    ['option_text' => 'False', 'order' => 2],
                    ['option_text' => "I don't know", 'order' => 3],
                ],
                'correct_option_order' => 2, // Correct answer is 'C'
            ],
            [
                'question_id' => 80,
                'options' => [
                    ['option_text' => 'Go to college', 'order' => 0],
                    ['option_text' => 'ABC', 'order' => 1],
                    ['option_text' => 'Graduate law school', 'order' => 2],
                    ['option_text' => 'Get a Ph.D.', 'order' => 3],
                ],
                'correct_option_order' => 1, // Correct answer is 'B'
            ],
            [
                'question_id' => 81,
                'options' => [
                    ['option_text' => 'Paul Rader', 'order' => 0],
                    ['option_text' => 'William Booth Clibborn', 'order' => 1],
                    ['option_text' => 'Charles Wesley', 'order' => 2],
                    ['option_text' => 'Fanny Crosby', 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
            [
                'question_id' => 82,
                'options' => [
                    ['option_text' => 'Confirming', 'order' => 0],
                    ['option_text' => 'Teaching', 'order' => 1],
                    ['option_text' => 'Proclaiming', 'order' => 2],
                    ['option_text' => 'Spreading', 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
            // Continue adding data for the remaining questions
            [
                'question_id' => 83,
                'options' => [
                    ['option_text' => 'Reads', 'order' => 0],
                    ['option_text' => 'Preaches', 'order' => 1],
                    ['option_text' => 'Teaches', 'order' => 2],
                    ['option_text' => 'Demonstrates', 'order' => 3],
                ],
                'correct_option_order' => 3, // Correct answer is 'D'
            ],
            [
                'question_id' => 84,
                'options' => [
                    ['option_text' => 'Word / Being / God', 'order' => 0],
                    ['option_text' => 'God / Being / Word', 'order' => 1],
                    ['option_text' => 'Word / God / God', 'order' => 2],
                    ['option_text' => 'Word / God / Being', 'order' => 3],
                ],
                'correct_option_order' => 3, // Correct answer is 'D'
            ],
            [
                'question_id' => 85,
                'options' => [
                    ['option_text' => 'Twenty-five percent', 'order' => 0],
                    ['option_text' => 'Fifty percent', 'order' => 1],
                    ['option_text' => 'Ninety-five percent', 'order' => 2],
                    ['option_text' => 'Eighty-five percent', 'order' => 3],
                ],
                'correct_option_order' => 2, // Correct answer is 'C'
            ],
            [
                'question_id' => 86,
                'options' => [
                    ['option_text' => 'Truth', 'order' => 0],
                    ['option_text' => 'Heresy', 'order' => 1],
                    ['option_text' => 'Holy', 'order' => 2],
                    ['option_text' => 'Righteous', 'order' => 3],
                ],
                'correct_option_order' => 1, // Correct answer is 'B'
            ],
            [
                'question_id' => 87,
                'options' => [
                    ['option_text' => 'True', 'order' => 0],
                    ['option_text' => 'Maybe', 'order' => 1],
                    ['option_text' => 'False', 'order' => 2],
                    ['option_text' => "I don't know", 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
            [
                'question_id' => 88,
                'options' => [
                    ['option_text' => 'Dishonorable', 'order' => 0],
                    ['option_text' => 'Noble', 'order' => 1],
                    ['option_text' => 'Honorable', 'order' => 2],
                    ['option_text' => 'Godly', 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
            [
                'question_id' => 89,
                'options' => [
                    ['option_text' => 'Mixing', 'order' => 0],
                    ['option_text' => 'Stirring', 'order' => 1],
                    ['option_text' => 'Cooking', 'order' => 2],
                    ['option_text' => 'Eating', 'order' => 3],
                ],
                'correct_option_order' => 3, // Correct answer is 'D'
            ],
            [
                'question_id' => 90,
                'options' => [
                    ['option_text' => 'Five thousand', 'order' => 0],
                    ['option_text' => 'One hundred', 'order' => 1],
                    ['option_text' => 'One thousand', 'order' => 2],
                    ['option_text' => 'Ten thousand', 'order' => 3],
                ],
                'correct_option_order' => 3, // Correct answer is 'D'
            ],
            [
                'question_id' => 91,
                'options' => [
                    ['option_text' => 'Amalekites', 'order' => 0],
                    ['option_text' => 'Abrahamites', 'order' => 1],
                    ['option_text' => 'Hittites', 'order' => 2],
                    ['option_text' => 'Moabites', 'order' => 3],
                ],
                'correct_option_order' => 1, // Correct answer is 'B'
            ],
            [
                'question_id' => 92,
                'options' => [
                    ['option_text' => 'Princess', 'order' => 0],
                    ['option_text' => 'Mother of all living', 'order' => 1],
                    ['option_text' => 'Queen', 'order' => 2],
                    ['option_text' => 'Mother of nations', 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
            [
                'question_id' => 93,
                'options' => [
                    ['option_text' => 'True', 'order' => 0],
                    ['option_text' => 'Maybe', 'order' => 1],
                    ['option_text' => 'False', 'order' => 2],
                    ['option_text' => 'No', 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
            [
                'question_id' => 94,
                'options' => [
                    ['option_text' => 'Building', 'order' => 0],
                    ['option_text' => 'Mind', 'order' => 1],
                    ['option_text' => 'Heart', 'order' => 2],
                    ['option_text' => 'Church', 'order' => 3],
                ],
                'correct_option_order' => 2, // Correct answer is 'C'
            ],
            [
                'question_id' => 95,
                'options' => [
                    ['option_text' => 'Always', 'order' => 0],
                    ['option_text' => 'Sometimes', 'order' => 1],
                    ['option_text' => 'Never', 'order' => 2],
                    ['option_text' => "I don't know", 'order' => 3],
                ],
                'correct_option_order' => 2, // Correct answer is 'C'
            ],
            [
                'question_id' => 96,
                'options' => [
                    ['option_text' => 'Sinus trouble', 'order' => 0],
                    ['option_text' => 'Tumor', 'order' => 1],
                    ['option_text' => 'Cancer', 'order' => 2],
                    ['option_text' => 'Arthritis', 'order' => 3],
                ],
                'correct_option_order' => 3, // Correct answer is 'D'
            ],
            [
                'question_id' => 97,
                'options' => [
                    ['option_text' => 'True', 'order' => 0],
                    ['option_text' => 'Maybe', 'order' => 1],
                    ['option_text' => 'False', 'order' => 2],
                    ['option_text' => "I don't know", 'order' => 3],
                ],
                'correct_option_order' => 0, // Correct answer is 'A'
            ],
        ];

        foreach ($answerOptionsData as $data) {
            $questionId = $data['question_id'];
            $correctOptionOrder = $data['correct_option_order'];
            $correctOptionId = null;

            foreach ($data['options'] as $option) {
                $optionId = DB::table('answer_options')->insertGetId([
                    'question_id' => $questionId,
                    'option_text' => $option['option_text'],
                    'order' => $option['order'],
                    'created_at' => '2024-09-15 13:05:10',
                    'updated_at' => '2024-09-15 13:05:10',
                ]);

                // Check if this option is the correct one
                if ($option['order'] == $correctOptionOrder) {
                    $correctOptionId = $optionId;
                }
            }

            // Update the question with the correct_option_id
            if ($correctOptionId) {
                Question::where( 'id', $questionId)->update([
                        'correct_answer_option_id' => $correctOptionId
                    ]);
            }
        }
    }
}
