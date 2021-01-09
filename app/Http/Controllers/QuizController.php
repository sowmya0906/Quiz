<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $q = quiz::all();
        return view('questions.index',compact('q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    // shuffle the result

        $request->validate([

            'question' => 'required',
            'option1'  => 'required',
            'option2'  => 'required',
            'option3'  => 'required',
            'option4'  => 'required',
            'correctoption'  => 'required'
            // 'image' =>'required'
        ]);
        $title = $request->question;
        $option1 = $request->option1;
        $option2 = $request->option2;
        $option3 = $request->option3;
        $option4 = $request->option4;
        $correctoption = $request->correctoption;
        $image = $request->file('image');
        $imagename = time().'.'.$image->extension();
        $image->move(public_path('Questions_images'),$imagename);

        $questions = new quiz();
        $questions->title = $title;
        $questions->option1 = $option1;
        $questions->option2 = $option2;
        $questions->option3 = $option3;
        $questions->option4 = $option4;
        $questions->correctoption = $correctoption;
        $questions->image = $imagename;



            // $questions=new quiz([
            //     'title'=>$request->get('question'),
            //     'option1'=>$request->get('option1'),
            //     'option2'=>$request->get('option2'),
            //     'option3'=>$request->get('option3'),
            //     'option4'=>$request->get('option4'),
            //     'correctoption'=>$request->get('correctoption'),
            //     'image'=>$request->get('image')


            // ]);
            // $imagename  = time().'.'.$image->extension();

            $questions->save();
            return Redirect(Route('questions.index'))->with('success', 'Question saved!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $quiz = quiz::findorFail($id);

        return view('questions.edit_questions',compact('quiz'));
        //dd($quiz);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $shark = quiz::find($id);

        $request->validate([

            'title' => 'required',
            'option1'  => 'required',
            'option2'  => 'required',
            'option3'  => 'required',
            'option4'  => 'required',
            'correctoption'  => 'required'
            // 'image' =>'required'
        ]);
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image!=0){
            $request->validate([
                'title'=>'required',
                'option1'=>'required',
                'option2'=>'required',
                'option3'=>'required',
                'option4'=>'required',
                'correctoption'=>'required',
                'image'         =>  'image|max:2048',

            ]);
            $image = $request->file('image');
            $imagename = time().'.'.$image->extension();
            $image->move(public_path('Questions_images'),$imagename);
            $shark->image=$imagename;


        }
        $shark->title       = $request->get('title');
        $shark->option1      = $request->get('option1');
        $shark->option2      = $request->get('option2');
        $shark->option3      = $request->get('option3');
        $shark->option4      = $request->get('option4');
        $shark->correctoption      = $request->get('correctoption');
        $shark->save();
         return Redirect(Route('questions.index'))->with('success', 'Question updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coupons=quiz::findorFail($id);
        $coupons->delete();
        return Redirect(Route('questions.index'))->with('success', 'Successfully Deleted!');
    }
}
