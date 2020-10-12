<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coupons=Coupons::all();
        return view('coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coupons.create_coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $pin = mt_rand(99, 100)
        . mt_rand(99, 100)
        . $characters[rand(0, strlen($characters) - 1)];

    // shuffle the result
    $coupon_name = strtoupper(str_shuffle($pin));
        $request->validate([

            'name' => 'required',
        ]);
            $coupons=new Coupons([
                'name'=>$request->get('name'),
                'coupon_name'=>$coupon_name,
            ]);
            $coupons->save();
            return Redirect(Route('coupons.index'))->with('success', 'Coupoun saved!');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function show(Coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupons $coupon)
    {
        //
        return view('coupons.edit_coupons',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Coupons $coupon)
    {
        //
        $request->validate([
            'name'=>'required',
        ]);
            $coupon->update($request->all());
        return Redirect(Route('coupons.index'))->with('success', 'Coupoun updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coupons=Coupons::findorFail($id);
        $coupons->delete();
        return Redirect(Route('coupons.index'))->with('success', 'Successfully Deleted!');


    }
}
