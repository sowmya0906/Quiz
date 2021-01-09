<?php

namespace App\Http\Controllers;

use App\Models\Questions_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class QuestionsModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_id=Auth::user()->id;
        $question_id = User::inRandomOrder()->first();

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questions_model  $questions_model
     * @return \Illuminate\Http\Response
     */
    public function show(Questions_model $questions_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questions_model  $questions_model
     * @return \Illuminate\Http\Response
     */
    public function edit(Questions_model $questions_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questions_model  $questions_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions_model $questions_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questions_model  $questions_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions_model $questions_model)
    {
        //
    }
}
