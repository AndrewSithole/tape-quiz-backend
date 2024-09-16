<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer_option_id',
    ];
    public function question() {
        return $this->belongsTo(Question::class);
    }
    public function option() {
        return $this->belongsTo(AnswerOption::class);
    }
}
