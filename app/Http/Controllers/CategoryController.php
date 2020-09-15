<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

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
        return view('admin.category.create');
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
            'categoryName' => 'required|unique:categories',
            'categoryDescription' => 'required',
            'categoryPic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('categoryPic');
        $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images/category');
        $image->move($destinationPath, $input['imagename']);
        $category = new Category([
            'categoryName' => $request->get('categoryName'),
            'categoryDescription' => $request->get('categoryDescription'),
            'categoryPic' => $input['imagename'],
        ]);
        $category->save();
        return redirect('/category/create')->with('success', 'Category saved!');
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
        return view('admin.category.edit', compact('category'));
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
            'categoryName' => 'required|unique:categories,categoryName,' . $id,
            'categoryDescription' => 'required',
            'categoryPic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $category = Category::find($id);
        $category->categoryName = $request->get('categoryName');
        $category->categoryDescription = $request->get('categoryDescription');
        if ($request->has('categoryPic')) {
            $image = $request->file('categoryPic');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/category');
            $image->move($destinationPath, $input['imagename']);
            $category->categoryPic = $input['imagename'];
        };

        $category->save();
        return redirect('/category')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category')->with('success', 'Category deleted!');
    }
}
