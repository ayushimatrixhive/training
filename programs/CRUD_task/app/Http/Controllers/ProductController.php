<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Product::all();
        return view('view',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $student= new Product;
        $student->name =$request->name;
        $student->cetegory =$request->cetegory;
        $student->price =$request->price;
        $student->image =$request->image;
        $student->discription =$request->discription;
        $student->status =$request->status;
        $student->quantity =$request->quantity;
        $student->save();
        return redirect(route('index'))->with('status','ADDED! DATA');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $requestData = $request->all();
        // $fileName = uniqid().$request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->storeAs('images', $fileName, 'public');
        // $requestData["image"] = '/storage/'.$path;
        // Product::create($requestData);
        // return redirect('index')->with('flash_message', 'Employee Addedd!');  
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
        $student = Product::find($id);
        return view('editform',['student'=>$student]);
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
        $student = Product::find($id);
        $student->name =$request->name;
        $student->cetegory =$request->cetegory;
        $student->price =$request->price;
        $student->image =$request->image;
        $student->discription =$request->discription;
        $student->status =$request->status;
        $student->quantity =$request->quantity;
        $student->save();

        return redirect(route('index'))->with('status','UPDATED ! DATA');

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
        return redirect(route('index'))->with('status','DELETED DATA ! DATA');

    }
}
