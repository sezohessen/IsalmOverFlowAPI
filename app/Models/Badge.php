<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable=[
        'description',
        'badge_rank',
    ];
    use HasFactory;
}
