<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'accept_answer',
        'user_id',
        'score',
        'views',
        'description',
        'last_edit',
        'closed_date'
    ];
    use HasFactory;
}
