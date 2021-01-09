<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\school_register;
use App\Models\User;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        //dd($request);

        //$requestData = $request->all();


        if ($request->has('student1')) {
            $name = $request->get('student1');
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(9999, 10000)
    . mt_rand(9999, 10000)
    . $characters[rand(0, strlen($characters) - 1)];

    // shuffle the result
    $unique_id = strtoupper(str_shuffle($pin));
    $user = new User();
    $user->unique_id = $unique_id;
    $user->email = $request->input('email');
    $user->school_name = $request->input('school_name');
    $user->category = $request->input('category');
    $user->student1 = $request->input('student1');
    $user->student2 = $request->input('student2');
    $user->phone = $request->input('phone');
    $user->password = Hash::make($request->input('password'));


    $user->save();

        }
        else{
            $name = $request->get('coordinator');
            $school = new school_register([
                'school_name'=>$request->get('school_name'),
                'coordinator'=>$request->get('coordinator'),
                'email'=>$request->get('email'),
                'phone_number'=>$request->get('phone_number'),
                'numberofteams'=>$request->get('amount'),

            ]);
            $school->save();
        }

        //dd($name);

        //  if($request->get('student1')!=NULL)
        //  $name=$request->get('student1');
        //  else
        //  $name=$request->get('coordinator');

         //dd($request->get('student1'));


        if($request->input('amount') == 1){
            $amount = $request->input('amount')*200;

        }
        if($request->input('amount') > 1 ){
            $amount = $request->input('amount')*200;

        }
        // return $amount;

        $api = new Api('rzp_test_JgGzOqLEVa9bEd', '6IhJkdSXtJWy574G0CKvHUOI');
        $order  = $api->order->create(array('receipt' => '123', 'amount' =>$amount*100 , 'currency' => 'INR')); // Creates order
       $orderId = $order['id'];
//   return $order['amount'];

   $user_pay = new Payment();

  $user_pay->name = $name;
  $email = $request->input('email');
  $user_pay->email = $email;

  $user_pay->amount = $amount;

//   return $user_pay->amount;
    $user_pay->payment_id = $orderId;
    //dd($user_pay);
    $user_pay->save();
        // return $user_pay;
        $request->session()->put('name',$name);
       $request->session()->put('order_id', $orderId);
       $request->session()->put('amount' , $amount);
       $request->session()->put('email' ,$email );
    //    return $request->session()->get('amount');
//     // $value = $request->session()->get('amount');
    // return $value;
        return redirect(route('payment-page'));




    }


    public function pay(Request $request){
        //dd($request);
        $data = $request->all();
        // return $request->all();
        //$id=Auth::user()->unique_id;
        $user=new payment();
        $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        $user->payment_done=1;
        $user->razorpay_id=$data['razorpay_payment_id'];
       // $user->unique_id=$id;
        // $user->name=$data['name'];
        // return $user;
        // $user->payment_done = 1;
        // $user->razorpay_id = $data['razorpay_payment_id'];
        $user->save();
        //dd($user);
        // return redirect('/success');
        //return $user->email;

        $u = User::where('email', $user->email)->get();

        $count = $u->count();

        if($count == 1){

        $user_details = User::where('email', $user->email)->first();

        $user_details->is_paid = 1;

        $user_details->save();
        }
        else{
            $user_d = school_register::where('email', $user->email)->first();

        $user_d->is_paid = 1;

        $user_d->save();
        //dd($user_d);

        }
        //dd($user_details);
        // if($user->payment_done == 1 && $user_details->is_paid == 1)


        if ($user->payment_done==1)        {


            $request->session()->forget('order_id');
            $request->session()->forget('amount');
                 }
        //return redirect('/home');
        // else
        // return redirect('/');

// return dd($request->all());
return redirect('login')->with('status','Successfully Registered!!');
    }

}
