<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'question_id',
        'user_id',
        'score',
        'description',
        'best_answer'
    ];
    use HasFactory;
}
