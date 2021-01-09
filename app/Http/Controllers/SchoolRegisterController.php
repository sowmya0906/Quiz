<?php

namespace App\Http\Controllers;

use App\Models\school_register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SchoolRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }
    public function about($school=null)
    {
        echo $school;
        //return view('auth.register');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd($request);

        $school = new school_register([
            'school_name'=>$request->get('school_name'),
            'coordinator'=>$request->get('coordinator'),
            'email'=>$request->get('email'),
            'phone_number'=>$request->get('phone_number'),
            'numberofteams'=>$request->get('amount'),

        ]);
        $school->save();
        return redirect(route('register.index'))->with('message', 'Thanks for registering!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\school_register  $school_register
     * @return \Illuminate\Http\Response
     */
    public function show(school_register $school_register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\school_register  $school_register
     * @return \Illuminate\Http\Response
     */
    public function edit(school_register $school_register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\school_register  $school_register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, school_register $school_register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\school_register  $school_register
     * @return \Illuminate\Http\Response
     */
    public function destroy(school_register $school_register)
    {
        //
    }
}
