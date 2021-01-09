<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolRegistrationDetailsController extends Controller
{
    //
    public function about(Request $request)
    {
        # code...

        //echo "hello";
        $name = $request->second_option;
        return view('auth.register',compact('name'));
    }
}
