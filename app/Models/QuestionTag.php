<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionTag extends Model
{
    protected $fillable = [
        'question_id',
        'tag_id'
    ];
    use HasFactory;
}
