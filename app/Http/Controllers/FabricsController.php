<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Style;
use App\Models\Fabric;
use Illuminate\Support\Facades\DB;

class FabricsController extends Controller{
    
    public function index(){

        $rm = Fabric::paginate(5);
        return view("pages.fabric.index",['rm'=>$rm]);
    }

    
    public function create(){

        $style = Style::all();
        return view("pages.fabric.create",['style'=>$style]);
    }

    
    public function store(Request $request){

        //Validate Data
        // $request->validate([
        //     'name'=>'required|string|max:255',
        //     'description'=>'required|string',
        //     'image'=>'required|mimes:jpeg,png,jpg,gif|max:2048',
        //     'price' => 'required|numeric',
        //     'ProductCategoryId' => 'required|exists:product_categories,id',
        // ]);

        //Image Upload
        $photoName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('img'),$photoName);

        $rm = new Fabric;
        $rm->style_id = $request->styleId;
        $rm->name = $request->name;
        $rm->description = $request->description;
        $rm->photo = $photoName;

        $rm->save();
        
        return back()->with('success','Created Successfully.');
    }

   
    public function show(string $id){
        $rm = Fabric::where('id',$id)->first();
        return view("pages.fabric.show",['rm'=>$rm]);
    }
   
    public function edit(string $id){

        $rm = Fabric::where('id',$id)->first();
        $style = Style::all();

        return view("pages.fabric.edit",['rm'=>$rm,'style'=>$style]);
    }

    
    public function update(Request $request, string $id){

         //Validate Data
        //  $request->validate([
        //     'name'=>'required|string|max:255',
        //     'description'=>'required|string',
        //     'image'=>'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        //     'price' => 'required|numeric',
        //     'ProductCategoryId' => 'required|exists:product_categories,id',
        // ]);

        $rm = Fabric::where('id',$id)->first();

        //Image Upload
        if(isset($request->photo)){
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'),$photoName);
            $rm->photo = $photoName;
        };

        $rm->style_id = $request->styleId;
        $rm->name = $request->name;
        $rm->description = $request->description;

        $rm->update();
        
        return back()->with('success','Updated Successfully.');
    }

    
    public function destroy(string $id){
        $rm = Fabric::where('id',$id)->first();
        $rm->delete();

        return back()->with('success','Deleted Successfully.');
    }

}
