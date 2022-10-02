<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewComment extends Model
{
    protected $fillable = [
        'description',
        'question_id',
        'user_id',
        'comment_id'
    ];
    use HasFactory;
}
