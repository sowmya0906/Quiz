@extends('layouts.app')

@section('content')
<div class="container-fluid">
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
                                <a href="{{route('questions.create')}}"><button type="button" class="btn btn-primary">Create Question</button></a>

                            </div>
                            <div class="col-sm">
                                <a href="{{('/import_excel')}}"><button type="button" class="btn btn-primary">Upload Questions</button></a>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm">
                                <table class="table table-striped">
                                  <thead>
                                      <tr>
                                        <td>ID</td>
                                        <td>Question</td>
                                        <td>Option1</td>
                                        <td>Option2</td>
                                        <td>Option3</td>
                                        <td>Option4</td>
                                        <td>Correct Option</td>
                                        <td>image</td>
                                        <td colspan = 2><center>Actions</center></td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach($q as $coupoun)
                                      <tr>
                                          <td>{{$coupoun->id}}</td>
                                          <td>{{$coupoun->title}} </td>
                                          <td>{{$coupoun->option1}}</td>
                                          <td>{{$coupoun->option2}}</td>
                                          <td>{{$coupoun->option3}}</td>
                                          <td>{{$coupoun->option4}}</td>
                                          <td>{{$coupoun->correctoption}}</td>
                                           @if($coupoun->image)
                                          <td>
                                          <img src="{{asset('Questions_images')}}/{{$coupoun->image}}" width="40px" height = "40px">
                                        </td>
                                        @else
                                        <td> </td>
                                           @endif
                                          <td>
                                              <a href="{{ route('questions.edit',$coupoun->id)}}" class="btn btn-primary">Edit</a>
                                          </td>
                                          <td>
                                              <form action="{{ route('questions.destroy', $coupoun->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                              </form>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
