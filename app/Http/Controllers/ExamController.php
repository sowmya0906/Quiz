<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //
   public function index(Request $request){


    $questions = quiz::all()->random(1);

    return view('UserQuestions.exampage',compact('questions'));

   }


}
