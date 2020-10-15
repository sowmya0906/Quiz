@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select School/Individual</label>
                    <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                        <option value="">Select...</option>
                    <option value="{{route('individual')}}">Individual</option>
                        <option value="{{route('register')}}">School</option>
                      </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

