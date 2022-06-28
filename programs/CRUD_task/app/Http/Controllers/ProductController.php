<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sab_Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category= Category::all();
        $sab_category=Sab_Category::all();
        return view('product',['category'=> $category , 'sab_category'=> $sab_category]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/u',
            'cetegory'=>'required',
            'price' => 'required|numeric|not_in:0',
            'image' => 'required|mimes:jpeg,bmp,png|max:5000',
            'discription' => 'required',
            'status' => 'required',
            'quantity' => 'required|integer',
        ],
        [
            'name.required' => 'Enter Your name',
            'cetegory.required' => 'Enter Your cetegory',
            'price.required' => 'Enter Your price',
            'image.required' => 'Enter Your image',
            'discription.required' => 'Enter Your discription',
            'status.required' => 'Enter Your status',
            'quantity.required' => 'Enter Your quantity',
        ]);


        $student= new Product;
        $student->name =$request->name;
        $student->cetegory =$request->cetegory;
        $student->price =$request->price;
       // $student->image =$request->image;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/students/', $filename);
            $student->image = $filename;
        }
        $student->discription =$request->discription;
        $student->status =$request->status;
        $student->quantity =$request->quantity;
        $student->save();
        return redirect(route('index'))->with('status','SUBMITED DATA SUCCESSFULLY...!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( )
    {
        $students = Product::all();
        return view('listing',['students'=>$students]);
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
		$category= Category::all();
        $sab_category=Sab_Category::all();
        return view('editform',['student'=>$student],['category'=> $category , 'sab_category'=> $sab_category]);
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
            'name' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/u',
            'cetegory'=>'required',
            'price' => 'required|numeric|not_in:0',
            'image' => 'required|mimes:jpeg,bmp,png|max:5000',
            'discription' => 'required',
            'status' => 'required',
            'quantity' => 'required|integer',
			
        ],
        [
            'name.required' => 'Enter Your name',
            'cetegory.required' => 'Enter Your cetegory',
            'price.required' => 'Enter Your price',
            'image.required' => 'Enter Your image',
            'discription.required' => 'Enter Your discription',
            'status.required' => 'Enter Your status',
            'quantity.required' => 'Enter Your quantity',
        ]);

        $student = Product::find($id);
        $student->name =$request->name;
        $student->cetegory =$request->cetegory;
        $student->price =$request->price;
        // $student->image =$request->image;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/students/', $filename);
            $student->image = $filename;
        }
        $student->discription =$request->discription;
        $student->status =$request->status;
        $student->quantity =$request->quantity;
        $student->save();
        return redirect('listing')->with('status','UPDATED ! DATA SUCCESSFULLY...');
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
        return redirect('listing')->with('status','DELETED DATA ! DATA SUCCESSFULLY...');
    }
}