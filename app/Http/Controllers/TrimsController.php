<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trim;
use Illuminate\Support\Facades\DB;

use function Termwind\style;

class TrimsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trim = Trim::paginate(5);
        return view("pages.trim.index",['trim'=>$trim]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view("pages.trim.create");
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

        $trim = new Trim;
        $trim->name = $request->name;

        $trim->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trim = Trim::where('id',$id)->first();
        return view("pages.trim.show",['trim'=>$trim]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $trim = Trim::where('id',$id)->first();
        return view("pages.trim.edit",['trim'=>$trim]);
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

        $trim = Trim::where('id',$id)->first();
        $trim->name = $request->name;
        $trim->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trim = Trim::where('id',$id)->first();
        $trim->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
