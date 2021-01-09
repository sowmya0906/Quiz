<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->role == 0  ){
            if(Auth::user()->is_paid == 1){

        $count = Payment::all()->where('unique_id',Auth::user()->unique_id)->where('exam_done', 0);
        $total_count = count($count);

        return view('home',compact('total_count'));
            }
            else
            {
                Auth::logout();
            return view('main');
            }

        }
        else if(Auth::check() && Auth::user()->role == 1)
        return redirect('admin');
        else
        {
            Auth::logout();

        return view('main');
        }




    }
}
