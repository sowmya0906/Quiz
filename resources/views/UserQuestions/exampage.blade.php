@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}

body {
    background-color: #333
}

.container-exam {
    background-color: rgb(14, 13, 13);
    color: #ddd;
    border-radius: 10px;
    padding: 50px;
    font-family: 'Montserrat', sans-serif;
}

.container-exam>p {
    font-size: 32px
}

.question {
    width: 75%
}

.options {
    position: relative;
    padding-left: 40px
}

#options label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    cursor: pointer
}

.options input {
    opacity: 0
}

.checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #555;
    border: 1px solid #ddd;
    border-radius: 50%
}

.options input:checked~.checkmark:after {
    display: block
}

.options .checkmark:after {
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark {
    background: #21bf73;
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.btn-primary {
    background-color: #555;
    color: #ddd;
    border: 1px solid #ddd
}

.btn-primary:hover {
    background-color: #21bf73;
    border: 1px solid #21bf73
}

.btn-success {
    padding: 5px 25px;
    background-color: #21bf73
}

@media(max-width:576px) {
    .question {
        width: 100%;
        word-spacing: 2px
    }
}
</style>
@section('content')
<!-- CSS only -->


{{-- <div class="container">

    @foreach($questions as $q)
    @inject('question', 'App\Models\quiz')



    <form action="" method="POST" style="margin:50px;">
        <center>
       <div class="container"><h3>{{$q->title}}</h3></div>

       <div class="container">

            <div class="row no-gutters">
                <div class="col-0">
                    <input type="radio" name = "option" value = "{{$q->option1}}">
                </div>
                <div class="col-1">
                    <span>{{$q->option1}}</span>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-0">
                    <input type="radio" name = "option" value = "{{$q->option2}}">
                </div>
                <div class="col-1">
                    <span>{{$q->option2}}</span>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-0">
                    <input type="radio" name = "option" value = "{{$q->option3}}">
                </div>
                <div class="col-1">
                    <span>{{$q->option3}}</span>
                </div>
              </div>
              <div class="row no-gutters">
                <div class="col-0">
                    <input type="radio" name = "option" value = "{{$q->option4}}">
                </div>
                <div class="col-1">
                    <span>{{$q->option4}}</span>
                </div>
              </div>

              <br>

       <button href="" value = "Submit" class="btn btn-success" > Submit</button>


       </div>
    </center>
    </form>   

    @endforeach
    {{ $question::paginate(5)}}
</div>  --}}

 <div class="container bg-info" style="background: white;">
    <div class="row">
<div class="col-sm-8">
    @foreach($questions as $q)
    @inject('question', 'App\Models\quiz')
    {{-- <div class="modal-dialog">
        <br>
      <div class="modal-content">
         <div class="modal-header">
            <h3><span class="label label-warning" id="qid"></span>{{$q->title}} </h3>
        </div>
        <div class="modal-body">

          <div class="quiz" id="quiz" data-toggle="buttons">
           <label class="element-animation1 btn btn-lg btn-primary btn-block">
               <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> 
               <input type="radio" name="q_answer" value="{{$q->option1}}"> {{$q->option1}}
            </label>
           <label class="element-animation2 btn btn-lg btn-primary btn-block">
               <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                <input type="radio" name="q_answer" value="{{$q->option2}}"> {{$q->option2}}
            </label>
           <label class="element-animation3 btn btn-lg btn-primary btn-block">
               <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span>
                <input type="radio" name="q_answer" value="{{$q->option3}}"> {{$q->option3}}
            </label>
           <label class="element-animation4 btn btn-lg btn-primary btn-block">
               <span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> 
               <input type="radio" name="q_answer" value="{{$q->option4}}"> {{$q->option4}}
            </label>
            <center>
            <input type = "button" name="submit" value = "Submit" class="btn btn-success">
            </center>
       </div>
   </div>   --}}
   <div class="container-exam">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
    <div class="py-2 h5">Q)<b>{{$q->title}}</b></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options"> 
            
            <label class="options">{{$q->option1}} <input type="radio" name="radio"> <span class="checkmark"></span> </label> 
            <label class="options">{{$q->option2}}<input type="radio" name="radio"> <span class="checkmark"></span>
             </label> <label class="options">{{$q->option3}} <input type="radio" name="radio"> <span class="checkmark"></span> </label> 
             <label class="options">{{$q->option4}}<input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
    </div>
    <div class="d-flex align-items-center pt-3">
        <div id="prev"> <button class="btn btn-primary">Previous</button> </div>
        <div class="ml-auto mr-sm-5"> <button class="btn btn-success">Next</button> </div>
        
    </div>
    
</div>
      </div>
<div class="col-sm-4">
    <div class="container" style="border: 2px solid black;">
        <div class="row">
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            {{-- <div class="col-sm-3">
                <p>q</p>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            {{-- <div class="col-sm-3">
                <p>q</p>
            </div> --}}
        </div>
         <div class="row">
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            <div class="col-sm-3">
                <p>q</p>
            </div>
            {{-- <div class="col-sm-3">
                <p>q</p>
            </div> --}}
        </div>
    </div>
</div>
      </div>
      </div>
      
</div>
<br>
</div>

@endforeach
{{-- <div class="d-flex align-items-center">
    <span style="padding-left:25%;">{{ $question::paginate(5)}}</span> --}}

</div>
</div>



<script>
    $(function(){
    var loading = $('#loadbar').hide();
    $(document)
    .ajaxStart(function () {
        loading.show();
    }).ajaxStop(function () {
    	loading.hide();
    });
    
  
});	
</script>


@endsection
