<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Style;
use App\Models\Trim;
use App\Models\StyleTrim;
use Illuminate\Support\Facades\DB;

class StyleTrimsController extends Controller{
    
    public function index(){

        $rm = StyleTrim::paginate(3);
        return view("pages.style_trim.index",['rm'=>$rm]);
    }

    
    public function create(){

        $style = Style::all();
        $trim = Trim::all();

        return view("pages.style_trim.create",['style'=>$style,'trim'=>$trim]);
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

        $rm = new StyleTrim;
        $rm->style_id = $request->styleId;
        $rm->trim_id = $request->trimId;
        $rm->description = $request->description;
        $rm->photo = $photoName;

        $rm->save();
        
        return back()->with('success','Created Successfully.');
    }

   
    public function show(string $id){
        $rm = StyleTrim::where('id',$id)->first();
        return view("pages.style_trim.show",['rm'=>$rm]);
    }
   
    public function edit(string $id){

        $rm = StyleTrim::where('id',$id)->first();
        $style = Style::all();
        $trim = Trim::all();

        return view("pages.style_trim.edit",['rm'=>$rm,'style'=>$style,'trim'=>$trim]);
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

        $rm = StyleTrim::where('id',$id)->first();

        //Image Upload
        if(isset($request->photo)){
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'),$photoName);
            $rm->photo = $photoName;
        };

        $rm->style_id = $request->styleId;
        $rm->trim_id = $request->trimId;
        $rm->description = $request->description;

        $rm->update();
        
        return back()->with('success','Updated Successfully.');
    }

    
    public function destroy(string $id){
        $rm = StyleTrim::where('id',$id)->first();
        $rm->delete();

        return back()->with('success','Deleted Successfully.');
    }

}
