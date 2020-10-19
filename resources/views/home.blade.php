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
                <a href="">My exams</a>
                <br>

                <a href="">My reports</a>
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
    <div class="col-sm">
        {{ __('You are logged in as user ! and your unique id is    ') }}
        {{Auth::user()->unique_id }}

    </div>

</div>
                        <div class="row">

                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        Exam 1
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Consits of 25 questions</p>
                                    <br>
                                  <a href="https://razorpay.com/">  <button type="button" class="btn btn-primary">Take test</button> </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        Exam 2
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Consits of 25 questions</p>
                                    <br>
                                  <a href="https://razorpay.com/">  <button type="button" class="btn btn-primary">Take test</button> </a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        Exam 3
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>Consits of 25 questions</p>
                                    <br>
                                  <a href="https://razorpay.com/">  <button type="button" class="btn btn-primary">Take test</button> </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
