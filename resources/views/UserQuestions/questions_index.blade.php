@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Options
                </div>
            </div>
            <div class="card-body">
            <a href="{{('/exams')}}">My exams <span style="color:navy;">{{$total_count}}</span></a>
                <br>

                <a href="">Change password</a>
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

                        <div class="row">
                            <?php $a=1; ?>
                            @while($total_count >0)

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        Exam {{ $a}}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Consits of 25 questions</p>
                                    <br>
                                <form action="{{ route('exampage')}}" method="POST">
                                        
                                    @csrf  

@method('POST')
                                        <button class="btn btn-primary">Take Test</button>

                                    </form>
                                {{-- <a href="{{route('exampage')}}">  <button type="button" class="btn btn-primary">Take test</button> </a> --}}
                                </div>
                            </div>
                            <?php
                            $total_count=$total_count-1;
                            $a=$a+1;
                            ?>
                            @endwhile


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
