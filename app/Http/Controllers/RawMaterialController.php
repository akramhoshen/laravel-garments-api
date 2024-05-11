<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Style;
use App\Models\RawMaterial;
use App\Models\RawMaterialCategorie;
use App\Models\Uom;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;

class RawMaterialController extends Controller{
    
    public function index(){

        $rm = DB::table('raw_materials as rm')
        ->join('styles as s','s.id','=','rm.style_id')
        ->join('raw_material_categories as rmc','rmc.id','=','rm.rm_category_id')
        ->join('uoms as u','u.id','=','rm.uom_id')
        ->join('vendors as v','v.id','=','rm.vendor_id')
        ->select('rm.id','s.code as style','rmc.name as rm_category','rm.name','rm.description','u.name as uom','rm.unit_price','rm.photo','v.organization as vendor')
        ->paginate(3);
        return view("pages.raw_material.index",['rm'=>$rm]);
    }

    
    public function create(){

        $style = Style::all();
        $categories = RawMaterialCategorie::all();
        $uom = Uom::all();
        $vendor = Vendor::all();

        return view("pages.raw_material.create",['style'=>$style,'categories'=>$categories,'uom'=>$uom,'vendor'=>$vendor]);
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

        $rm = new RawMaterial;
        $rm->style_id = $request->styleId;
        $rm->rm_category_id = $request->rmCategoryId;
        $rm->name = $request->name;
        $rm->description = $request->description;
        $rm->uom_id = $request->uomId;
        $rm->unit_price = $request->unitPrice;
        $rm->photo = $photoName;
        $rm->vendor_id = $request->vendorId;

        $rm->save();
        
        return back()->with('success','Created Successfully.');
    }

   
    public function show(string $id){
        $rm = RawMaterial::where('id',$id)->first();
        return view("pages.raw_material.show",['rm'=>$rm]);
    }
   
    public function edit(string $id){

        $rm = RawMaterial::where('id',$id)->first();
        $style = Style::all();
        $categories = RawMaterialCategorie::all();
        $uom = Uom::all();
        $vendor = Vendor::all();

        return view("pages.raw_material.edit",['rm'=>$rm,'style'=>$style,'categories'=>$categories,'uom'=>$uom,'vendor'=>$vendor]);
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

        $rm = RawMaterial::where('id',$id)->first();

        //Image Upload
        if(isset($request->photo)){
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'),$photoName);
            $rm->photo = $photoName;
        };

        $rm->style_id = $request->styleId;
        $rm->rm_category_id = $request->rmCategoryId;
        $rm->name = $request->name;
        $rm->description = $request->description;
        $rm->uom_id = $request->uomId;
        $rm->unit_price = $request->unitPrice;
        $rm->vendor_id = $request->vendorId;

        $rm->update();
        
        return back()->with('success','Updated Successfully.');
    }

    
    public function destroy(string $id){
        $rm = RawMaterial::where('id',$id)->first();
        $rm->delete();

        return back()->with('success','Deleted Successfully.');
    }

}
