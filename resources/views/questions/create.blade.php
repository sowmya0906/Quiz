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
                                <form method="post" action="{{ route('questions.store') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="first_name">question:</label>
                                        <input type="text" class="form-control" name="question"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">option1:</label>
                                        <input type="text" class="form-control" name="option1"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">option:2</label>
                                        <input type="text" class="form-control" name="option2"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">option3:</label>
                                        <input type="text" class="form-control" name="option3"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">option4:</label>
                                        <input type="text" class="form-control" name="option4"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">Correct Option:</label>
                                        <input type="text" class="form-control" name="correctoption"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="first_name">Image:</label>
                                        <input type="file" class="form-control" name="image"/>
                                    </div>


                                    <button type="submit" class="btn btn-success">Generate question</button>                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
