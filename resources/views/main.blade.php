

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GeoMap Quiz 2020</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></

script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    body{
        background-color:#ffcccc;
    }
        .carousel-caption {
    top: 0;
    bottom: auto;
}
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" >
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white;">
                   GeoMap Quiz 2020
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


            </div>
        </nav>
        </div>

    <br>

<center><h1>Welcome to GeoMap Quiz 2020</h1></center>
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
      <img src="{{ asset('GeoMap1.JPG')}}" class="d-block" alt="..." style="border:2px solid white;" width="700px">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('GeoMap2.JPG')}}" class="d-block" alt="..." style="border:2px solid white;" width="700px">
    </div>
    <div class="carousel-item">
      <img src="{{asset('DSC_0108.JPG')}}" class="d-block" alt="..." style="border:2px solid white;" width="700px">
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
        <div class="col-md-4" style="background-color:whitesmoke;">
            <br><br><br><br><br><br><br><br><br><br>


               <h3><center>To know more about us please click here!</center></h3>



<center>
   <a href="{{'/selectform'}}"><button type="button" class="btn btn-primary" style="margin-right:5%;"><b>Get Started</b></button></a>
   </center>



                    <br>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

