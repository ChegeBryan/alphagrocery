<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->take(5)->get();
        return view('admin.category.create', compact('categories'));
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
            'category_name' => 'required|unique:categories',
            'category_description' => 'required',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('category_image');
        $extension = $image->getClientOriginalExtension();
        $filename  = 'category-' . time() . '.' . $extension;
        $category = new Category([
            'category_name' => $request->get('category_name'),
            'category_description' => $request->get('category_description'),
            'category_image' => $filename,
        ]);
        $category->save();
        $image->storeAs('categories', $filename, 'public');
        return redirect()->route('category.create')->with('success', 'Category saved!');
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
        $category = Category::find($id);
        $categories = Category::latest()->take(5)->get();
        return view('admin.category.edit', compact('category', 'categories'));
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
            'category_name' => 'required|unique:categories,category_name,' . $id,
            'category_description' => 'required',
            'category_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $category = Category::find($id);
        $category->category_name = $request->get('category_name');
        $category->category_description = $request->get('category_description');
        $current_image = $category->category_image;
        $new_image = "";

        if ($request->has('category_image')) {
            $new_image = $request->file('category_image');
            $extension = $new_image->getClientOriginalExtension();
            $filename  = 'category-' . time() . '.' . $extension;
            $category->category_image = $filename;
            $new_image->storeAs('categories', $filename, 'public');
        };

        $category->save();
        if (Storage::disk('public')->exists('categories/' . $new_image)) {
            Storage::disk('public')->delete('categories/' . $current_image);
        }
        return redirect()->route('category.index')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();

            return redirect()->route('category.index')->with('success', 'Category deleted!');
        } catch (Exception $e) {
            return redirect()->route('category.index')->with('warning', 'Category has associated subcategory. Deletion cancelled!');
        }
    }
}
