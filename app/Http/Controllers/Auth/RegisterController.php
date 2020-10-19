<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Foreach_;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name2' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number'=>['required', 'string',  'min:1o', 'unique:users'],
            'age'=>['required', 'string', 'min:2'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        if(array_key_exists('coupon_code',$data)){
            $abc=$data['coupon_code'];


                $type="school";
                $org=$data['organisation'];

        }
        else{
            $abc="no_coupon";
            $type="individual";
            $org="No_organisation";
            // if($abc=="no_coupon"){
            //     $type="individual";
            // }
            // else{
            //     $type="school";
            // }
        }
        # code...

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $pin = mt_rand(9999, 10000)
        . mt_rand(9999, 10000)
        . $characters[rand(0, strlen($characters) - 1)];

    // shuffle the result
    $unique_id = strtoupper(str_shuffle($pin));



        return User::create([
            'name' => $data['name'],
            'name2'=>$data['name2'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobile_number'=>$data['mobile_number'],
            'age'=>$data['age'],
            'account_type'=>$type,
            'unique_id'=>$unique_id,
            'organisation_name'=>$org,
            'coupon_code'=>$abc,


        ]);
    }
}
