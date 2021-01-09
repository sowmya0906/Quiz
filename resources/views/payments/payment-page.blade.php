{{-- <button id="rzp-button1" hidden>Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{$response['razorpayId']}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$response['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "{{$response['currency']}}",
    "name": "{{$response['name']}}",
    "description": "{{$response['description']}}",
    "image": "https://example.com/your_logo", // You can give your logo url
    "order_id": "{{$response['orderId']}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        // After payment successfully made response will come here
        // send this response to Controller for update the payment response
        // Create a form for send this data
        // Set the data in form
        document.getElementById('rzp_paymentid').value = response.razorpay_payment_id;
        document.getElementById('rzp_orderid').value = response.razorpay_order_id;
        document.getElementById('rzp_signature').value = response.razorpay_signature;

        // // Let's submit the form automatically
        document.getElementById('rzp-paymentresponse').click();
    },
    "prefill": {
        "name": "{{$response['name']}}",
        "email": "{{$response['email']}}",
        "contact": "{{$response['contactNumber']}}"
    },
    // "notes": {
    //     "address": "{{$response['address']}}"
    // },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
window.onload = function(){
    document.getElementById('rzp-button1').click();
};

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<!-- This form is hidden -->
<form action="{{url('/payment-complete')}}" method="POST" hidden>
        <input type="hidden" value="{{csrf_token()}}" name="_token" />
        <input type="text" class="form-control" id="rzp_paymentid"  name="rzp_paymentid">
        <input type="text" class="form-control" id="rzp_orderid" name="rzp_orderid">
        <input type="text" class="form-control" id="rzp_signature" name="rzp_signature">
    <button type="submit" id="rzp-paymentresponse" class="btn btn-primary">Submit</button>
</form> --}}



@extends('layouts.app')

@section('content')
<script>
    window.onload = function(){
    var button = document.getElementsByClassName('razorpay-payment-button');
    setInterval(function(){
        button.click();
    },1000);  // this will make it click again every 1000 miliseconds
};
</script>

@if(Session::has('amount'))
<div class="container text-center">
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
      data-buttontext="Pay with Razorpay (Test Mode Only)"
      data-name="{{Session::get('name')}}"
      data-description="Test transaction"

      data-theme.color="#F37254"
  ></script>
  <input type="hidden" custom="Hidden Element" name="hidden">
  </form>

</div>

@endif
@endsection
