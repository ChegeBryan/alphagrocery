<?php

namespace App\Http\Controllers;

use App\ProductParameter;
use Illuminate\Http\Request;
use Mockery\Generator\Parameter;

class ProductParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_parameters = ProductParameter::all();
        return view('admin.productParameter.index', compact('product_parameters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productParameter.create');
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
            'parameter' => 'required|unique:product_parameters',
        ]);

        $parameter = new ProductParameter([
            'parameter' => $request->get('parameter'),
        ]);
        $parameter->save();
        return redirect('/prodparameter/create')->with('success', 'Parameter saved!');
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
        $parameter = ProductParameter::find($id);
        return view('admin.productParameter.edit', compact('parameter'));
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
        $request->validate([
            'parameter' => 'required|unique:product_parameters,parameter,' . $id,
        ]);


        $parameter = ProductParameter::find($id);
        $parameter->parameter = $request->get('parameter');

        $parameter->save();
        return redirect('/prodparameter')->with('success', 'Parameter updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parameter = ProductParameter::find($id);
        $parameter->delete();

        return redirect('/prodparameter')->with('success', 'Parameter deleted!');
    }
}
