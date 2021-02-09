<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\payments_table;
use App\Models\school_register;
use App\Models\User;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
                'phone_number'=>$request->get('phone'),
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

//         $api = new Api('rzp_test_JgGzOqLEVa9bEd', '6IhJkdSXtJWy574G0CKvHUOI');
//         $order  = $api->order->create(array('receipt' => '123', 'amount' =>$amount*100 , 'currency' => 'INR')); // Creates order
//        $orderId = $order['id'];
// //   return $order['amount'];

//    $user_pay = new Payment();

//   $user_pay->name = $name;
//   $email = $request->input('email');
//   $user_pay->email = $email;

//   $user_pay->amount = $amount;

// //   return $user_pay->amount;
//     $user_pay->payment_id = $orderId;
//     //dd($user_pay);
//     $user_pay->save();
//         // return $user_pay;
//         $request->session()->put('name',$name);
//        $request->session()->put('order_id', $orderId);
//        $request->session()->put('amount' , $amount);
//        $request->session()->put('email' ,$email );
    //    return $request->session()->get('amount');
//     // $value = $request->session()->get('amount');
    // return $value;
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];

    // shuffle the result
    $order_id = str_shuffle($pin);
    $apiEndpoint = "https://test.cashfree.com";
    $opUrl = $apiEndpoint."/api/v1/order/create";

    $cf_request = array();
    $cf_request["appId"] = "4944865a7886ab6298432226984494";
    $cf_request["secretKey"] = "d6d6a95a4e369745158bbbbb36b7adafc8a6918d";
    $cf_request["orderId"] = $order_id;
    $cf_request["orderAmount"] = $amount;
    $cf_request["orderNote"] = "Subscription";
    $cf_request["customerPhone"] = $request->input('phone');
    $cf_request["customerName"] = $request->input('name');
    $cf_request["customerEmail"] = $request->input('email');
    $cf_request["returnUrl"] = "RETURNURL";
    $cf_request["notifyUrl"] = "NOTIFYURL";

    $timeout = 10;
    $request->session()->put('data', $cf_request);
    $request_string = "";
    foreach($cf_request as $key=>$value) {
      $request_string .= $key.'='.rawurlencode($value).'&';
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"$opUrl?");
    curl_setopt($ch,CURLOPT_POST, count($cf_request));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $request_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    $curl_result=curl_exec ($ch);
    curl_close ($ch);

    $jsonResponse = json_decode($curl_result);
    if ($jsonResponse->{'status'} == "OK") {
      $paymentLink = $jsonResponse->{"paymentLink"};
      //Send this payment link to customer over email/SMS OR redirect to this link on browser
    } else {
     //Log request, $jsonResponse["reason"]
    }
    $pay = DB::table('payments_tables')->insert([
        'orderId'=>$order_id,
        'orderAmount'=>$amount,
        'orderCurrency'=>"INR",
        'orderNote'=>"payment",
        'customerName'=>$name,
        'customerEmail'=>$request->input('email'),
        'customerPhone'=>$request->input('phone'),

    ]);
    // $pay->save();
    //dd($pay);
    $value = $request->session()->get('data');

    $secretKey = "d6d6a95a4e369745158bbbbb36b7adafc8a6918d";

    ksort($cf_request);
     $signatureData = "";
     foreach ($cf_request as $key => $value){
          $signatureData .= $key.$value;
     }
     $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
     $signature = base64_encode($signature);
     $request->session()->put('siganture',$signature);

    // dd($value['orderAmount']);



    return redirect("https://test.cashfree.com/billpay/checkout/post/submit");
        //return redirect(route('payment-page'));




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
