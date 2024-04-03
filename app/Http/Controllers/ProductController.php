<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $prodcutData = Product::all();
        // return view('product.view', ['data' =>$prodcutData]);
        if(\request()->ajax()){
            $data = Product::with('category:id,category');
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function($row){
                //     $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                //     return $actionBtn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        return view('product.index');
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $p_file = $request->file('product_image'); 
        $p_file_name = $p_file->getClientOriginalName();
        Storage::disk('public')->put('upload/'.$p_file_name, file_get_contents($p_file));
        Product::create([
            'name' => $request->product_name,
            'category_id' => $request->category_name,
            'description' => $request->product_dis,
            'price' => $request->product_price,
            'quantity' => $request->product_quantity,
            'image' => $p_file_name
            
        ]);
        return redirect()->route('product.index')->with('prodcut', 'Product Create Succesfully');

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
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)

        
    {  
        $product = Product::find($id);
        $image_uplode = $product->image;
 
        if($request->hasFile('product_image')){
            $p_file = $request->file('product_image');
            $p_file_name = $p_file->getClientOriginalName();
            Storage::disk('public')->put('upload/'.$p_file_name, file_get_contents($p_file));
            $image_uplode = $p_file_name;
        };
        
        Product::where('id', $id)->update([ 
            'name' => $request->product_name,
            'category_id' => $request->category_name,
            'description' => $request->product_dis,
            'price' => $request->product_price,
            'quantity' => $request->product_quantity,
            'image' => $image_uplode

        ]);

        return redirect()->route('product.index')->with('EditProduct', "Product Succesfully Edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->with('DeleteProduct', "Product Delete");
    }

    public function datatable(ProductsDataTable $dataTable){
        // dd($dataTable);
        return $dataTable->render('product.index');
    }
}
