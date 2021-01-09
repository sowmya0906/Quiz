@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
<div class="card">
<div class="card-header">{{_('Options')}}</div>
<div class="card-body">
<a href="{{route('coupons.index')}}">Create Coupons</a>
<br><br>
<a href="{{route('questions.index')}}">Create Questions</a>
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

                    {{ __('You are logged in as admin! and your unique id is ') }}
                    {{Auth::user()->unique_id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
