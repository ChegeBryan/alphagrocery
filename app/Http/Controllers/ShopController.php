<?php

namespace App\Http\Controllers;

use App\Product;
use App\Subcategory;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shopByCategory($id)
    {
        $category = Category::find($id);
        $products = $category->products()->paginate(20);
        return view('shopcategory', compact('category', 'products'));
    }

    public function shopBySubcategory($id)
    {
        $products = Product::where('subcategory_id', $id)->paginate(20);
        $subcategory = Subcategory::find($id);
        return view('shopsubcategory', compact('products', 'subcategory'));
    }

    public function shopByStore($name)
    {
    }
}
