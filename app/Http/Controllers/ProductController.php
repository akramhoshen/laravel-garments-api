<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Product_categories;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller{
    
    public function index(){

        //sir
        // $products = Product::all();

        // $products = Product::get();

        //For pagination
        // $products = Product::latest()->paginate(5);

        //Without Model
        // $products = DB::table('products')->paginate(5);

        $products = DB::table('products as p')
        ->join('product_categories as c','c.id','=','p.category_id')
        ->select('p.id','p.name','p.description','p.image','p.price','c.name as category')
        ->paginate(5);
        return view("pages.product.index",['products'=>$products]);
    }

    
    public function create(){

        //For Product Category id
        $categories = Product_categories::all();

        return view("pages.product.create",['categories'=>$categories]);
    }

    
    public function store(Request $request){

        //Validate Data
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'required|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'ProductCategoryId' => 'required|exists:product_categories,id',
        ]);

        //Image Upload
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('assets/img'),$imageName);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->category_id = $request->ProductCategoryId;

        $product->save();
        
        return back()->with('success','Created Successfully.');
    }

   
    public function show(string $id){
        $product = Product::where('id',$id)->first();
        // $product = Product::find($id);
        return view("pages.product.show",['product'=>$product]);
    }

    //Sir Show

    // public function show(Product $product){     
    //     return view("pages.product.show",["product"=>$product]);
    // }

   
    public function edit(string $id){

        //Showing Data inject or not
        // dd($id);

        $product = Product::where('id',$id)->first();
        // $product = Product::find($id);
        $categories = Product_categories::all();
        return view("pages.product.edit",['product'=>$product,'categories'=>$categories]);
    }

    //Sir Edit

    // public function edit(Product $product){
    //     $categories = Product_categories::all();
    //     return view("pages.product.edit",['product'=>$product,'categories'=>$categories]);
    // }

    
    public function update(Request $request, string $id){

         //Validate Data
         $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'ProductCategoryId' => 'required|exists:product_categories,id',
        ]);

        $product = Product::where('id',$id)->first();
        // $product = Product::find($id);

        //Image Upload
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/img'),$imageName);
            $product->image = $imageName;
        };

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->ProductCategoryId;

        $product->update();
        
        return back()->with('success','Updated Successfully.');
    }

    //Sir Update

    // public function update(Request $request, Product $product){

    //     $product->name = $request->name;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->category_id = $request->ProductCategoryId;

    //     $product->update();
        
    // }

    
    public function destroy(string $id){
        $product = Product::where('id',$id)->first();
        // $product = Product::find($id);
        $product->delete();

        return back()->with('success','Updated Successfully.');
    }

    //Sir Delete

    // public function destroy(Product $product){
    //     $product->delete();
    //     return redirect()->route("products.index")->with('success','Success.');
        
    // }
}
