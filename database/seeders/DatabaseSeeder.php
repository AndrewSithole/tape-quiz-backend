<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Andrew',
            'email' => 'andrewsithole7@gmail.com',
            'password' => 'asdf1234',
        ]);
        $this->call(MessageSeeder::class);
        $this->call(QuizzesSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerOptionSeeder::class);
    }
}
