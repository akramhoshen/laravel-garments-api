<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\DB;

use function Termwind\style;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trim = Size::paginate(5);
        return view("pages.size.index",['trim'=>$trim]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view("pages.size.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate Data
        $request->validate([
            'name'=>'required|string|max:255',
        ]);

        $trim = new Size;
        $trim->name = $request->name;

        $trim->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trim = Size::where('id',$id)->first();
        return view("pages.size.show",['trim'=>$trim]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trim = Size::where('id',$id)->first();
        return view("pages.size.edit",['trim'=>$trim]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        //Validate Data
        $request->validate([
            'name'=>'required|string|max:255',
        ]);

        $trim = Size::where('id',$id)->first();
        $trim->name = $request->name;
        $trim->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trim = Size::where('id',$id)->first();
        $trim->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
