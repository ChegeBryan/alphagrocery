<?php

namespace App\Http\Controllers;

use Session;
use App\Shipping;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('deliveryinfo')) {
            return redirect()->route('checkout.create')->with('alert', 'Provide delivery information before proceeding!');
        }
        $cartItems = \Cart::getContent();
        $deliverydetails = Shipping::find(Session::get('deliveryinfo'));
        return view('checkout.index', compact('cartItems', 'deliverydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $shipping = new Shipping([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone'),
            'address' => $request->get('address'),
        ]);
        $shipping->save();
        $deliveryinfo = $shipping->id;
        Session::put('deliveryinfo', $deliveryinfo);
        return redirect()->route('checkout.index')->with('success', 'Delivery information saved you can place order.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
