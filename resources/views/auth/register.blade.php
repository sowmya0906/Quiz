@extends('layouts.app')


@section('content')
@include('sweetalert::alert')
<style>
    body{
        background-color:#ffcccc;
    }
    </style>

<div class="container-fluid" style="border:2px solid white;background-color:white;width:95%;">
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <div class="row justify-content-center">
        <div class="col-sm-6" >
            <br><br>
            <!--<img src= "{{asset('public/ss.jpg')}}" style="border:2px solid white;margin-left: 10%;" width="650px"><br><br>-->
               <div id="carouselExampleIndicators" data-interval="3000" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('GeoMap1.JPG')}}" class="d-block"  style="border:2px solid white;" width="700px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('GeoMap2.JPG')}}" class="d-block"  style="border:2px solid white;" width="700px">
    </div>
    <div class="carousel-item">
      <img src="{{asset('DSC_0108.JPG')}}" class="d-block" style="border:2px solid white;" width="700px">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
        </div>
        <div class="col-md-6">
            <br><br><br><br>
            <div class="card" style="margin-right: 10%;margin-left:10%;">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('payment') }}">
                        @csrf
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif





                        {{-- @if ($errors->has('msg'))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<div>
<script>
jQuery(document).ready(function () {
       var $sch = localStorage.getItem('name');
        if( $sch === "Other"){
         $("#school").show();
         $("#schoolname").hide();

        }
        else
        {
            $("#schoolname").show();
            $("#school").hide();

        }
    });
</script>
</div>
@if($name == "others")
 <div class="form-group row" id="school" style="display:none;">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Your School Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="school_name" value="{{ old('name') }}"autocomplete="name2" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @else



                         <div class="form-group row" id="schoolname">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('School Name') }}</label>
                                <div class="col-md-6">
                                {{-- <input type="text" id="name_2" class="form-control"  placeholder="name" name="school_name" value="" autofocus> --}}
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="school_name" autocomplete="name2" value="{{$name}}" autofocus readonly>


                                </div>
                            </div>
                            @endif


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Coordinator') }}</label>

                            <div class="col-md-6">
                                <input id="name2" type="text" class="form-control @error('name2') is-invalid @enderror" name="coordinator" value="{{ old('name2') }}" required autocomplete="name2" autofocus>

                                @error('name2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="phone_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number">

                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- <div class="form-group row">-->
                        <!--    <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Date-of-Birth') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <input id="text" type="date"  class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" placeholder="MM/DD/YYY">-->


                        <!--        @error('age')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- <div class="form-group row">-->
                        <!--    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Coupon Code') }}</label>-->

                        <!--    <div class="col-md-6">-->
                        <!--        <input id="text" type="text" class="form-control @error('coupon_code') is-invalid @enderror" name="coupon_code" value="{{ old('coupon_code') }}" required autocomplete="coupon_code">-->

                        <!--        @error('coupon_code')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div> -->
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Number Of Teams') }}</label>

                            <div class="col-md-6">
                                <input id="text" class="form-control @error('no_of_students') is-invalid @enderror" name="amount" value="{{ old('no_of_students') }}" required autocomplete="age">



                                @error('no_of_students')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                                <label style="font-weight:20px;"class="col-md-12">X RS.200 PER TEAM</label>

                            </div>

                          </div>
                        {{-- <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>
                            <div class="col-md-6">

                            <select class="form-control" id="exampleFormControlSelect1" name="organisation">
                                @foreach ($cat as $cats)

                                <option class="form-control" value="{{$cats->name}}">{{$cats->name}}</option>

                                @endforeach

                            </select>
                            </div>
                          </div>--}}




                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" id="register" class="btn btn-primary" value="{{ __('Register') }}"><br><br>

                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>


@endsection
