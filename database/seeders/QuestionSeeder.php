<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'id' => 78,
                'quiz_id' => 1,
                'question_text' => 'Was Brother Branham preaching in Tempe or Mesa, Arizona?',
                'order' => 1,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 79,
                'quiz_id' => 1,
                'question_text' => 'The Gospel is complicated.',
                'order' => 2,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 80,
                'quiz_id' => 1,
                'question_text' => '"That’s all you have to do. That settles it. _______, and you’re fully educated, as far as I’m concerned."',
                'order' => 3,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 81,
                'quiz_id' => 1,
                'question_text' => 'Who wrote the song Only Believe?',
                'order' => 4,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 82,
                'quiz_id' => 1,
                'question_text' => '"And they went forth, and preached every where, the Lord working with them, _______ the word with signs following. Amen."',
                'order' => 5,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 83,
                'quiz_id' => 1,
                'question_text' => 'The only way that the signs of Mark 16 can follow the believer, is that the Holy Spirit, Himself, takes the Word of God and _______ it to the people.',
                'order' => 6,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 84,
                'quiz_id' => 1,
                'question_text' => '"The living _______, spoke by a living _______, must be in a living _______."',
                'order' => 7,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 85,
                'quiz_id' => 1,
                'question_text' => 'How much Truth did the first lie that was ever told have?',
                'order' => 8,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 86,
                'quiz_id' => 1,
                'question_text' => 'Paul said to Agrippa, "In the way that’s called \'_______,\' that’s the way that I worship the God of our fathers."',
                'order' => 9,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 87,
                'quiz_id' => 1,
                'question_text' => 'There’s only one thing that Jesus Christ can be different in, that is, a physical, corporal body.',
                'order' => 10,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 88,
                'quiz_id' => 1,
                'question_text' => 'The Bible said, "A woman that cuts her hair is _______."',
                'order' => 11,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 89,
                'quiz_id' => 1,
                'question_text' => '"The proof of the pudding is the _______ thereof."',
                'order' => 12,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 90,
                'quiz_id' => 1,
                'question_text' => 'When Paul was in the ship ready to go down, how many devils set on the seas and said, "We got you now, Paul. Oh, you’re going to take it back"?',
                'order' => 13,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 91,
                'quiz_id' => 1,
                'question_text' => '"There’s always three classes of people, that’s: unbelievers, make-believers, and believers. We still have them today. That’s right. Unbelievers, make-believers, and believers; Sodomites, Lotites, and _______."',
                'order' => 14,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 92,
                'quiz_id' => 1,
                'question_text' => 'Abram’s name was changed to Abraham, “father of nations,” and Sarra’s name was changed to Sarah, "_______."',
                'order' => 15,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 93,
                'quiz_id' => 1,
                'question_text' => 'We are catholic, too, apostolic catholic',
                'order' => 16,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 94,
                'quiz_id' => 1,
                'question_text' => '"God watches over His Word, to confirm It. The only thing He’s trying to do is to find a _______ that He can get into."',
                'order' => 17,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 95,
                'quiz_id' => 1,
                'question_text' => 'God _______ changes His program.',
                'order' => 18,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 96,
                'quiz_id' => 1,
                'question_text' => 'What was the little fellow in the striped tie healed of?',
                'order' => 19,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
            [
                'id' => 97,
                'quiz_id' => 1,
                'question_text' => 'Nervousness is a bad thing, but God can heal it.',
                'order' => 20,
                'created_at' => '2024-09-15 13:05:10',
                'updated_at' => '2024-09-15 13:05:10',
            ],
        ];

        DB::table('questions')->insert($questions);
    }
}

