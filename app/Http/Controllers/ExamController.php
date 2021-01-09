<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use Illuminate\Request;

class ExamController extends Controller
{
    //
   public function index(Request $request){
    dd($request->all());

    $questions = quiz::all()->random(1);

    return view('UserQuestions.exampage',compact('questions'));

   }


}
