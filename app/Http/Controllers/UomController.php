<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uom;
use Illuminate\Support\Facades\DB;

use function Termwind\style;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Uom::paginate(5);
        return view("pages.uom.index",['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view("pages.uom.create");
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

        $categories = new Uom;
        $categories->name = $request->name;

        $categories->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Uom::where('id',$id)->first();
        return view("pages.uom.show",['categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Uom::where('id',$id)->first();
        return view("pages.uom.edit",['categories'=>$categories]);
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

        $categories = Uom::where('id',$id)->first();
        $categories->name = $request->name;
        $categories->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Uom::where('id',$id)->first();
        $categories->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
