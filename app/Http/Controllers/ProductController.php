<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductParameter;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('store.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all('id', 'subcategory_name');
        $parameters = ProductParameter::all('id', 'parameter');
        return view('store.product.create', compact('subcategories', 'parameters'));
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
            'subcategory' => 'required',
            'parameter' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|min:1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'quantity' => 'required|min:1',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename  = 'product-' . time() . '.' . $extension;

        $product = new Product([
            'subcategory_id' => $request->get('subcategory'),
            'store_id' => Auth::guard('store')->user()->id,
            'product_parameter_id' => $request->get('parameter'),
            'product_name' => $request->get('name'),
            'product_description' => $request->get('description'),
            'product_price' => $request->get('price'),
            'product_image' => $filename,
            'product_quantity' => $request->get('quantity'),
        ]);
        $product->save();
        $image->storeAs('products', $filename, 'public');
        return redirect('/products/create')->with('success', 'Product saved!');
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
