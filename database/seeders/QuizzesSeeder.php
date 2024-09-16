<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzesSeeder extends Seeder
{
    public function run()
    {
        DB::table('quizzes')->insert([
            'id' => 1,
            'message_id' => 321,
            'start_date' => '2024-08-29',
            'deadline' => '2024-09-30',
            'published' => 1,
            'max_questions' => 20,
            'created_at' => '2024-08-29 05:13:58',
            'updated_at' => '2024-08-29 05:13:58',
        ]);
    }
}

