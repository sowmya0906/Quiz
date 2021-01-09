@extends('layouts.app')


@section('content')
<style>
    body{
        background-color:#ffcccc;
    }
    </style>
<center><h1>GeoMap Quiz 2020</h1></center>
<div class="container"  style="border:2px solid white;background-color:white;width:100%;">
    <div class="row">
        <div class="col-md-8">
            <!--<img src= "{{asset('public/ss.jpg')}}" style="border:2px solid white;" width="700px">-->
            <div id="carouselExampleIndicators" data-interval="2000" class="carousel slide" data-ride="carousel">
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
        <div class="col-md-4">
            <br><br>
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <div class="form-group">
                    <form action="{{ route('selectform')}}" method="GET">
                        @csrf

                        <label for="exampleFormControlSelect1">Select School/Independent</label>

                    <select class="form-control" name="first_option">
                        <option value="">Select...</option>
                    <option value="1">Independent</option>
                    <option value="2">School</option>
                    </select>
                    <br>
                    </form>
                    <?php
                    use App\Models\Coupons;
                    $cat = Coupons::all();
                    ?>
                  <form action="{{ route('registerschool')}}" method="GET">

                    <label for="exampleFormControlSelect1" name="sec_option" style="display:none;">Select School Name</label>
                    <select class="form-control" name="second_option" style="display:none;" id="selectbox">
                        <option value="">Select...</option>

                        @foreach ($cat as $cats)

                        <option class="form-control" value="{{$cats->name}}">{{$cats->name}}</option>

                        @endforeach
                         <option class="form-control" value="others">Other</option></option>

                   </select>
                    <br>
                    <center>
                    <button class="btn btn-primary" name="register" style="display: none;">
                        Register
                    </button>
                    </center>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        var $firstSelect = jQuery('select[name="first_option"]');
        var $secondSelect = jQuery('select[name="second_option"]');

        var $sec_label = jQuery('label[name="sec_option"]');

        var $button = jQuery('button[name="register"]');

        $firstSelect.change(function () {
            if ($firstSelect.val() == 1) {
                window.location.href = "{{ route('individual')}}";
            }
            if ($firstSelect.val() == 2) {
                $secondSelect.show();
                $sec_label.show();
                $button.show();
            }
            else {
                $secondSelect.hide();
            }

        });
        jQuery(function () {
    // remove the below comment in case you need chnage on document ready
    // location.href=jQuery("#selectbox").val();
    jQuery("#selectbox").change(function () {
             var conceptName = $('#selectbox').find(":selected").text();

        // var $school = jQuery('select[name="second_option"]');
        window.localStorage.setItem('name', conceptName);
        //localStorage.setItem("name",conceptName);
        //var $name=localStorage.getItem('name');


        //location.href = jQuery(this).val();

        //var link = '/register'+'/'+conceptName;

        //window.location.href = "{{ route('registerschool')}}";




    })
})
    });
</script>

@endsection

