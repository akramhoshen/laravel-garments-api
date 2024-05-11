<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vendor;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendor = Vendor::paginate(5);
        return view("pages.vendor.index",['vendor'=>$vendor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view("pages.vendor.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'organization'=>'required|string',
            'contact_person'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'address'=>'required|string',
        ]);

        $vendor = new Vendor;
        $vendor->organization = $request->organization;
        $vendor->contact_person = $request->contact_person;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;

        $vendor->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vendor = Vendor::where('id',$id)->first();
        return view("pages.vendor.show",['vendor'=>$vendor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vendor = Vendor::where('id',$id)->first();
        return view("pages.vendor.edit",['vendor'=>$vendor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'organization'=>'required|string',
            'contact_person'=>'required|string',
            'phone'=>'required|string',
            'email'=>'required|string',
            'address'=>'required|string',
        ]);

        $vendor = Vendor::where('id',$id)->first();

        $vendor->organization = $request->organization;
        $vendor->contact_person = $request->contact_person;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;

        $vendor->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = Vendor::where('id',$id)->first();
        $vendor->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
