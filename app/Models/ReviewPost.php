<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewPost extends Model
{
    protected $fillable = [
        'question_id',
        'description',
        'question_id',
        'user_id'
    ];
    use HasFactory;
}
