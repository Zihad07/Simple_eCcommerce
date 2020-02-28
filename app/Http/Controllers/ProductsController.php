<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dump($request->all());
        request()->validate([
           'name'=>'required',
           'price'=>'required',
           'description'=>'required',
           'image'=>'required|image'
        ]);

//        Product Image Save
        $imagePath = $request->file('image')->store('uploads/products','public');
        Product::create([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'image'=>$imagePath,
            'description'=>$request->input('description')
        ]);

        return redirect(route('products.index'))->with('success','New Product Created Successfully : )');


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
        return view('products.edit',['product'=>Product::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        request()->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        if($request->hasFile('image')){
            request()->validate(['image'=>'required|image']);

            if(file_exists(public_path('storage/'.$product->image))){
                File::delete(public_path('storage/'.$product->image));
            }

            $imagePath = $request->file('image')->store('uploads/products','public');

//            Image upadate
            $product->image = $imagePath;
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

        return redirect(route('products.edit',$product->id))->with('success', 'Product Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
//        dd($product->image);
        if(file_exists(public_path('storage/'.$product->image))){
            File::delete(public_path('storage/'.$product->image));
        }

        $product->delete();
        return redirect()->back()->with('success','One Product Deleted Succefully');
    }
}
