@extends('layouts.app')

@section('content')
@include('sweetalert::alert')
<style>
    body{
        background-color:#ffcccc;
    }
    </style>
<div class="container-fluid" style="border:2px solid white;background-color:#ffcccc;width:95%;" >
    <div class="row justify-content-center" style="background: white;">
        <div class="col-md-6" >
            <br>
            <!--<img src= "{{asset('public/ss.jpg')}}" style="border:2px solid white;margin-left: 10%;" width="680px">-->
            <div id="carouselExampleIndicators" data-interval="3000" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('GeoMap1.JPG')}}" class="d-block" style="border:2px solid white;" width="700px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('GeoMap2.JPG')}}" class="d-block" style="border:2px solid white;" width="700px">
    </div>
    <div class="carousel-item">
      <img src="{{asset('DSC_0108.JPG')}}" class="d-block"  style="border:2px solid white;" width="700px">
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

        </div>
        <div class="col-md-6">
            <br>
            <div class="card" style="margin-right:10%;margin-left:10%;background-color:whitesmoke;">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('payment') }}">
                        @csrf
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('School Name') }}</label>

                            <div class="col-md-6">
                                <input id="names" type="text" name="school_name" class="form-control" required autocomplet autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="Standard_In_School" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
          <select class="form-control" name="category">
                                    <option value="0">Select..</option>
                                    <option value="Senior">Senior (9th & 10th Class)</option>
                                    <option value="Junior">Junior (7th & 8th Class)</option>
                                    <option value="Sub junior">Sub junior (5th & 6th Class)</option>

                                    </select>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student 1 Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="student1" value="{{ old('student1') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student 2 Name') }}</label>

                            <div class="col-md-6">
                                <input id="name2" type="text" class="form-control @error('name2') is-invalid @enderror" name="student2" value="{{ old('student2') }}" required autocomplete="name2" autofocus>

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
                                <input id="text" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="mobile_number">

                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
          <!--              <div class="form-group row">-->
          <!--                  <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Date-of-Birth') }}</label>-->

          <!--                  <div class="col-md-6">-->
          <!--<select name="Birthday_day" id="Birthday_Day"  >-->
          <!--                          <option value="-1">Day</option>-->
          <!--                          <option value="1">1</option>-->
          <!--                          <option value="2">2</option>-->
          <!--                          <option value="3">3</option>-->

          <!--                          <option value="4">4</option>-->
          <!--                          <option value="5">5</option>-->
          <!--                          <option value="6">6</option>-->
          <!--                          <option value="7">7</option>-->
          <!--                          <option value="8">8</option>-->
          <!--                          <option value="9">9</option>-->
          <!--                          <option value="10">10</option>-->
          <!--                          <option value="11">11</option>-->
          <!--                          <option value="12">12</option>-->

          <!--                          <option value="13">13</option>-->
          <!--                          <option value="14">14</option>-->
          <!--                          <option value="15">15</option>-->
          <!--                          <option value="16">16</option>-->
          <!--                          <option value="17">17</option>-->
          <!--                          <option value="18">18</option>-->
          <!--                          <option value="19">19</option>-->
          <!--                          <option value="20">20</option>-->
          <!--                          <option value="21">21</option>-->

          <!--                          <option value="22">22</option>-->
          <!--                          <option value="23">23</option>-->
          <!--                          <option value="24">24</option>-->
          <!--                          <option value="25">25</option>-->
          <!--                          <option value="26">26</option>-->
          <!--                          <option value="27">27</option>-->
          <!--                          <option value="28">28</option>-->
          <!--                          <option value="29">29</option>-->
          <!--                          <option value="30">30</option>-->

          <!--                          <option value="31">31</option>-->
          <!--                          </select>-->

          <!--                          <select id="Birthday_Month" name="Birthday_Month">-->
          <!--                          <option value="-1">Month</option>-->
          <!--                          <option value="January">Jan</option>-->
          <!--                          <option value="February">Feb</option>-->
          <!--                          <option value="March">Mar</option>-->
          <!--                          <option value="April">Apr</option>-->
          <!--                          <option value="May">May</option>-->
          <!--                          <option value="June">Jun</option>-->
          <!--                          <option value="July">Jul</option>-->
          <!--                          <option value="August">Aug</option>-->
          <!--                          <option value="September">Sep</option>-->
          <!--                          <option value="October">Oct</option>-->
          <!--                          <option value="November">Nov</option>-->
          <!--                          <option value="December">Dec</option>-->
          <!--                          </select>-->

          <!--                          <select name="Birthday_Year" id="Birthday_Year">-->

          <!--                          <option value="-1">Year</option>-->
          <!--                          <option value="2012">2012</option>-->
          <!--                          <option value="2011">2011</option>-->
          <!--                          <option value="2010">2010</option>-->
          <!--                          <option value="2009">2009</option>-->
          <!--                          <option value="2008">2008</option>-->
          <!--                          <option value="2007">2007</option>-->
          <!--                          <option value="2006">2006</option>-->
          <!--                          <option value="2005">2005</option>-->
          <!--                          <option value="2004">2004</option>-->
          <!--                          <option value="2003">2003</option>-->
          <!--                          <option value="2002">2002</option>-->
          <!--                          <option value="2001">2001</option>-->
          <!--                          <option value="2000">2000</option>-->

          <!--                          <option value="1999">1999</option>-->
          <!--                          <option value="1998">1998</option>-->
          <!--                          <option value="1997">1997</option>-->
          <!--                          <option value="1996">1996</option>-->
          <!--                          <option value="1995">1995</option>-->
          <!--                          <option value="1994">1994</option>-->
          <!--                          <option value="1993">1993</option>-->
          <!--                          <option value="1992">1992</option>-->
          <!--                          <option value="1991">1991</option>-->
          <!--                          <option value="1990">1990</option>-->

          <!--                          <option value="1989">1989</option>-->
          <!--                          <option value="1988">1988</option>-->
          <!--                          <option value="1987">1987</option>-->
          <!--                          <option value="1986">1986</option>-->
          <!--                          <option value="1985">1985</option>-->
          <!--                          <option value="1984">1984</option>-->
          <!--                          <option value="1983">1983</option>-->
          <!--                          <option value="1982">1982</option>-->
          <!--                          <option value="1981">1981</option>-->
          <!--                          <option value="1980">1980</option>-->
          <!--                          </select>-->

                                <!--<input id="text" type="date" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" placeholder="MM/DD/YYY">-->

          <!--                      @error('age')-->
          <!--                          <span class="invalid-feedback" role="alert">-->
          <!--                              <strong>{{ $message }}</strong>-->
          <!--                          </span>-->
          <!--                      @enderror-->
          <!--                  </div>-->
          <!--              </div>-->
                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Coupon Code') }}</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('coupon_code') is-invalid @enderror" name="coupon_code" value="{{ old('coupon_code') }}" required autocomplete="coupon_code">

                                @error('coupon_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                         <input id="password" type="hidden" class="form-control @error('amount') is-invalid @enderror" name="amount"  value="1">

                        <!-- <div class="form-group row">-->
                        <!--    <div class="col-md-6">-->


                        <!--        @error('amount')-->
                        <!--            <span class="invalid-feedback" role="alert">-->
                        <!--                <strong>{{ $message }}</strong>-->
                        <!--            </span>-->
                        <!--        @enderror-->
                        <!--    </div>-->
                        <!--</div>-->



                        <div class="form-group row">
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
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="register" class="btn btn-primary" >
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
  $("#register").click(function(){
    localStorage.setItem("name", $("#name").val());
     var $name=localStorage.getItem('name');

     localStorage.setItem("email", $("#email").val());
     var $email=localStorage.getItem('email');
     //alert($email +" "+$name);


  });
});

</script>



@endsection
