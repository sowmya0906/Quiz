<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class QuizQuestionsController extends Controller
{
    //
    public function index()
    {
        $count = Payment::all()->where('unique_id',Auth::user()->unique_id)->where('exam_done', 0);
        $total_count = count($count);

        return view('UserQuestions.questions_index',compact('total_count'));
    }
}
