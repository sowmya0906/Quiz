@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Payment Page') }}</div>

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
                                          <label for="exampleInputEmail1">Enter name</label>
                                          <input type="text" name="name" class="form-control" placeholder="Enter your name">
                                             </div>
                                        <div class="form-group">
                                          <label for="exampleInputPassword1">Enter amount</label>
                                          <input type="number" name="amount" class="form-control" id="exampleInputPassword1">
                                        </div>

                                        <button type="submit"  class="btn btn-primary btn-block">Submit</button>
                                      </form>








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
