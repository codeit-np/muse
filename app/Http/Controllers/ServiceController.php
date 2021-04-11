<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('backend.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.service.create',compact('categories'));
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
            'starting_price' => 'required | numeric',
        ]);

        $service =  new Service();
        $service->name = $request->name;
        $service->starting_price = $request->starting_price;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('service',$newName);
            $service->image = 'service/' . $newName;
        }else{
            $service->image = 'img/product.png';
        }

        $service->description = $request->description;
        $service->category_id = $request->category_id;
        $service->save();

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
        $service = Service::find($id);
        $categories = Category::all();
        return view('backend.service.edit',compact('service','categories'));
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
            'starting_price' => 'required|numeric',
        ]);

        $service =  Service::find($id);
        $service->name = $request->name;
        $service->starting_price = $request->starting_price;
        if($request->hasFile('image')){
            $data = $request->image;
            $newName = time() . $data->getClientOriginalName();
            $data->move('service',$newName);
            $service->image = 'service/' . $newName;
        }
        $service->description = $request->description;
        $service->category_id = $request->category_id;
        $service->update();

        $request->session()->flash('message','Record Updated');
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
