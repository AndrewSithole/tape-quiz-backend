<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $casts = [
        'date_preached' => 'datetime',
    ];
    protected $fillable = [
        'title',
        'code',
        'date_preached',
        'location',
        'image_url',
        'duration'
    ];

    public function quizzes() {
        return $this->hasMany(Quiz::class);
    }

}
