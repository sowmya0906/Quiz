<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
// use Session;

use Illuminate\Contracts\Session\Session;
class PaymentController extends Controller
{
    //

    public function index(){

        return view('payments.index');
    }

    public function success(){
        return view('success');
    }

    //rzp_test_hL4Etd0bXHkmO1
    //Gluvl9s5qfTBfbL1Ar8tCsnG


    public function payment(Request $request){


        $name = $request->input('name');
        if(!$request->input('amount')<100){
            $amount = $request->input('amount');

        }
        // return $amount;

        $api = new Api('rzp_test_JgGzOqLEVa9bEd', '6IhJkdSXtJWy574G0CKvHUOI');
        $order  = $api->order->create(array('receipt' => '123', 'amount' =>$amount*100 , 'currency' => 'INR')); // Creates order
       $orderId = $order['id'];
//   return $order['amount'];

   $user_pay = new Payment();

  $user_pay->name = $name;
  $user_pay->amount = $amount;
//   return $user_pay->amount;
    $user_pay->payment_id = $orderId;
    $user_pay->save();
        // return $user_pay;
        // $request->session()->put('name',$name);
       $request->session()->put('order_id', $orderId);
       $request->session()->put('amount' , $amount);
    //    return $request->session()->get('amount');
//     // $value = $request->session()->get('amount');
    // return $value;
        return redirect(route('payment-page'));




    }


    public function pay(Request $request){
        $data = $request->all();
        // return $request->all();
        $user=new payment();
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done=1;
        $user->razorpay_id=$data['razorpay_payment_id'];
        // $user->name=$data['name'];
        // return $user;
        // $user->payment_done = 1;
        // $user->razorpay_id = $data['razorpay_payment_id'];
        $user->save();
        // return redirect('/success');

// return dd($request->all());
return redirect('/home');
    }

}
