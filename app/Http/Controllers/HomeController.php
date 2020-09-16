<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;
use App\Subcategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->take(4)->get();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('home', compact('products', 'categories', 'subcategories'));
    }

    public function allProducts()
    {
        $products = Product::paginate(20);
        return view('shop', compact('products'));
    }
}
