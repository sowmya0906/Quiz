@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
<div class="card">
<div class="card-header">{{_('Options')}}</div>
<div class="card-body">
<a href="{{route('admin')}}">Home</a>
</div>
</div>

        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <h4 style="text-align: center;">Questions</h4>

                            </div>
                            <div class="col-sm">
                                <a href="{{route('questions.index')}}"><button type="button" class="btn btn-primary">View Questions</button></a>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <form action="{{ route('questions.update', $quiz->id) }}"  method="POST" enctype="multipart/form-data" >

                                    @csrf

                                    @method('PUT')

                                                                   <div class="form-group">

                                        <label for="first_name">Question:</label>
                                    <input type="text" class="form-control" name="title" value="{{$quiz->title}}"/>
                               </div>
                               <div class="form-group">

                                <label for="first_name">Option1:</label>
                            <input type="text" class="form-control" name="option1" value="{{$quiz->option1}}"/>
                       </div>
                       <div class="form-group">

                        <label for="first_name">Option2:</label>
                    <input type="text" class="form-control" name="option2" value="{{$quiz->option2}}"/>
               </div>
               <div class="form-group">

                <label for="first_name">Option3:</label>
            <input type="text" class="form-control" name="option3" value="{{$quiz->option3}}"/>
       </div>
       <div class="form-group">

        <label for="first_name">Option4:</label>
    <input type="text" class="form-control" name="option4" value="{{$quiz->option4}}"/>
</div>
<div class="form-group">

    <label for="first_name">Correct Option:</label>
<input type="text" class="form-control" name="correctoption" value="{{$quiz->correctoption}}"/>
</div>
<div class="form-group">
<label for="first_name">Image:</label>
<input type="file" class="form-control" name="image" value="{{$quiz->image}}"/>
</div>

                                    <button type="submit" class="btn btn-warning">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
