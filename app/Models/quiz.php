<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    use HasFactory;

    //protected $table = 'quizzes';

    protected $fillable = [
        'title',
        'option1',
        'option2',
        'option3',
        'option4',
        'correctoption',
        'image'

    ];


}
