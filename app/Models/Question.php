<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'question_text',
        'correct_answer_option_id',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(AnswerOption::class);
    }

    public function correctAnswer()
    {
        return $this->belongsTo(AnswerOption::class, 'correct_answer_option_id');
    }
}
