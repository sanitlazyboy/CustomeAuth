<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
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
        $category = Category::all();
        return view('category.view', ['data' =>$category]);

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $file = $request->file('image'); 
        $file_name = $file->getClientOriginalName();
        Storage::disk('public')->put('upload/'.$file_name, file_get_contents($file));
         Category::create([
            'category' => $request->category_name,
            'description' => $request->category_dis,
            'image' => $file_name
         ]);
        return redirect()->route('category.index')->with('category', 'Category Create Succesfully');
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
        $categories = Category::find($id);
        return view('category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $image_show = $category->image;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            Storage::disk('public')->put('upload/'.$file_name, file_get_contents($file));
            $image_show = $file_name;
        };

        Category::where('id', $id)->update([
            'category' => $request->category_name,
            'description' => $request->category_dis,
            'image' => $image_show
        ]);

        return redirect()->route('category.index')->with('EditData', "Category Succesfully Edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('DeleteData', "Category Delete Succesfully");
    }

    public function one(){
        // Category::truncate();
        // Product::truncate();
        // $cate = Product::with('category')->get();
        $BothData = Category::with('product')->get();
        return $BothData;
    }

   
}
