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
                                    <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
                                      @csrf
                                        {{-- <div class="form-group">
                                            <input type="hidden" name="appId" value="4944865a7886ab6298432226984494"/>
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

                                        {{-- <div class="form-group">
                                          <label for="exampleInputPassword1">Amount:200</label>
                                          <input type="hidden" name="amount" class="form-control" value="1" id="exampleInputPassword1" readonly placeholder="200">

                                        </div>
                                        <input type="hidden" name="returnUrl" value="http://127.0.0.1:8000/"/>

                                        <input type="submit" value="Pay"> --}}
{{--
                                       <button type="submit"  class="btn btn-primary btn-block">Pay Now</button> --}}
                                       <form id="redirectForm" method="post" action="/payment">
                                        <input type="hidden" name="appId" value="4944865a7886ab6298432226984494"/>
                                        <input type="hidden" name="orderId" value="order00001"/>
                                        <input type="hidden" name="orderAmount" value="100"/>
                                        <input type="hidden" name="orderCurrency" value="INR"/>
                                        <input type="hidden" name="orderNote" value="test"/>
                                        <input type="hidden" name="customerName" value="John Doe"/>
                                        <input type="hidden" name="customerEmail" value="Johndoe@test.com"/>
                                        <input type="hidden" name="customerPhone" value="9999999999"/>
                                        <input type="hidden" name="returnUrl" value="http://127.0.0.1:8000/"/>
                                      {{-- this has to be inserteed  --}}
                                      <?php
                                        $secretKey = "d6d6a95a4e369745158bbbbb36b7adafc8a6918d";
                                  $postData = array(
                                  "appId" => '4944865a7886ab6298432226984494',
                                  "orderId" => 'order00001',
                                  "orderAmount" => '100',
                                  "orderCurrency" => 'INR',
                                  "orderNote" => 'test',
                                  "customerName" => 'John Doe',
                                  "customerPhone" => '9999999999',
                                  "customerEmail" => 'Johndoe@test.com',
                                  "returnUrl" => 'http://127.0.0.1:8000/',
                                );
                                 // get secret key from your config
                                 ksort($postData);
                                 $signatureData = "";
                                 foreach ($postData as $key => $value){
                                      $signatureData .= $key.$value;
                                 }
                                 $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
                                 $signature = base64_encode($signature);
                                 ?>
                                    <input type="hidden" name="signature" value="<?php  echo $signature; ?>"/>

                                            <input type="submit" value="Pay">

                                      </form>
                                      {{-- <script>
                                        window.onload = function(){
                                        var button = document.getElementsByClassName('razorpay-payment-button');
                                        setInterval(function(){
                                            button.click();
                                        },1000);  // this will make it click again every 1000 miliseconds
                                    };
                                    </script> --}}

                                    {{-- @if(Session::has('amount'))
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

                                    @endif --}}






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
<script>
// document.getElementById("redirectForm").submit();
// window.location.reload();
</script>

@endsection
