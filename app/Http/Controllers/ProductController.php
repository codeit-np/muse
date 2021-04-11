<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required | numeric',
            'company' => 'required',
        ]);

        $product =  new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->company = $request->company;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('product',$newName);
            $product->image = 'product/' . $newName;
        }else{
            $product->image = 'img/product.png';
        }

        $product->description = $request->description;
        $product->category_id = $request->category_id;

        $product->save();

        $request->session()->flash('message','Record Save');
        return redirect()->back();
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
        $categories = Category::all();
        return view('backend.product.edit',compact('product','categories'));
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
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required | numeric',
            'company' => 'required',
        ]);

        $product =  Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->company = $request->company;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('product',$newName);
            $product->image = 'product/' . $newName;
        }

        $product->description = $request->description;
        $product->category_id = $request->category_id;
        
        $product->update();

        $request->session()->flash('message','Record Updated    ');
        return redirect()->back();
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
