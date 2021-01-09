@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Details Page') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="container">
                            <div class="row">
                                <div class="container mt-5 col-6 mx-auto pt-5">

                                    <div class="text-center">
                                    {{-- <img src="https://img.favpng.com/22/17/14/coffee-cup-breakfast-cafe-png-favpng-wum4UMesrHMdFxfe11NikwYbu.jpg" class="img-fluid" style="height:200px"> --}}
                                    </div>
                                    <form method="post" action="/payment">
                                      @csrf
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Name</label>
                                        <input type="hidden" name="student1" class="form-control" placeholder="Enter your name"  readonly>
                                        {{-- <script>
                                            document.write(localStorage.getItem('name'));
                                            </script> --}}
                                             </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                              <input type="hidden" name="email" class="form-control" placeholder="Enter your email"  readonly>
                                              {{-- <script>
                                                document.write(localStorage.getItem('email'));
                                                </script> --}}
                                                   </div>

                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Amount:200</label>
                                          <input type="hidden" name="amount" class="form-control" value="1" id="exampleInputPassword1" readonly placeholder="200">

                                        </div>
                                        <script>
                                            document.addEventListener('contextmenu', event => event.preventDefault());
                                        </script>



                                       <button type="submit"  class="btn btn-primary btn-block">Pay Now</button>
                                      </form>
                                      {{-- <script>
                                        window.onload = function(){
                                        var button = document.getElementsByClassName('razorpay-payment-button');
                                        setInterval(function(){
                                            button.click();
                                        },1000);  // this will make it click again every 1000 miliseconds
                                    };
                                    </script> --}}

                                    @if(Session::has('amount'))
                                    <div class="container tex-center">
                                    <form action="/pay" method="POST">
                                        <script>
                                            $(window).on('load', function() {
                                                jQuery('.razorpay-payment-button').click();
                                               });
                                            </script>
                                      <script
                                          src="https://checkout.razorpay.com/v1/checkout.js"
                                          data-key="rzp_test_JgGzOqLEVa9bEd"
                                    data-amount="{{Session::get('amount')}}"
                                          data-currency="INR"
                                    data-order_id="{{Session::get('order_id')}}"
                                          data-buttontext="Pay with Razorpay"
                                          data-name="{{Session::get('name')}}"
                                          data-description="Test transaction"

                                          data-theme.color="#F37254"
                                      ></script>
                                      <input type="hidden" custom="Hidden Element" name="hidden">
                                      </form>

                                    </div>

                                    @endif






                                </div>

                            </div>

                            {{-- @if(Session::has('amount'))
                            <div class="container tex-center">
                            <form action="/pay" method="POST">
                              <script
                                  src="https://checkout.razorpay.com/v1/checkout.js"
                                  data-key="rzp_test_JgGzOqLEVa9bEd"
                            data-amount="{{Session::get('amount')}}"
                                  data-currency="INR"
                            data-order_id="{{Session::get('order_id')}}"
                                  data-buttontext="Pay with Razorpay"
                                  data-name="Coffee"
                                  data-description="Test transaction"

                                  data-theme.color="#F37254"
                              >
                                                            function myFunction() {
                                  document.getElementById("demo").innerHTML = "Hello World";
                                }

                            </script>
                              <input type="hidden" custom="Hidden Element" name="hidden">
                              </form>

                            </div>

                            @endif --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
