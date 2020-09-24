<?php

namespace App\Http\Controllers;

use App\Subcategory;
use App\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Psy\debug;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all('id', 'category_name');
        $subcategories = Subcategory::latest()->take(5)->get();
        return view('admin.subcategory.create', compact('categories', 'subcategories'));
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
            'subcategory_name' => 'required|unique:subcategories',
            'category' => 'required',
            'subcategory_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('subcategory_image');
        $extension = $image->getClientOriginalExtension();
        $filename  = 'subcategory-' . time() . '.' . $extension;
        $subcategory = new Subcategory([
            'subcategory_name' => $request->get('subcategory_name'),
            'category_id' => $request->get('category'),
            'subcategory_image' => $filename,
        ]);
        $subcategory->save();
        $image->storeAs('subcategories', $filename, 'public');
        return redirect()->route('subcategory.create')->with('success', 'Sub-Category saved!');
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
        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        $subcategories = Subcategory::latest()->take(5)->get();
        return view('admin.subcategory.edit', compact('subcategory', 'categories', 'subcategories'));
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
            'subcategory_name' => 'required|unique:subcategories,subcategory_name,' . $id,
            'subcategory_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $subcategory = Subcategory::find($id);
        $subcategory->subcategory_name = $request->get('subcategory_name');
        $current_image = $subcategory->category_image;
        $new_image = "";

        if ($request->has('category')) {
            $subcategory->category_id = $request->get('category');
        };
        if ($request->has('subcategory_image')) {
            $new_image = $request->file('subcategory_image');
            $extension = $new_image->getClientOriginalExtension();
            $filename  = 'subcategory-' . time() . '.' . $extension;
            $subcategory->subcategory_image = $filename;
            $new_image->storeAs('subcategories', $filename, 'public');
        };
        if (Storage::disk('public')->exists('subcategories/' . $new_image)) {
            Storage::disk('public')->delete('subcategories/' . $current_image);
        }
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('success', 'Sub-Category updated!');
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
            $subcategory = Subcategory::find($id);
            $subcategory->delete();

            return redirect()->back()->with('success', 'Subcategory deleted!');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Subcategory has associated products. Deletion Canceled!');
        }
    }
}
