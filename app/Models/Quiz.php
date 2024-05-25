<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    public function sermon() {
        return $this->belongsTo(Message::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

}
