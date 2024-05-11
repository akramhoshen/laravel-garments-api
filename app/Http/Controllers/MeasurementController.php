<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Style;
use App\Models\Mesurment;

use function Termwind\style;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $measurement = Mesurment::paginate(5);
        return view("pages.measurement.index",['measurement'=>$measurement]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $style = style::all();
        return view("pages.measurement.create",['style'=>$style]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'code'=>'required|string',
        //     'StyleCategoryId' => 'required|exists:style_categories,id',
        //     'description'=>'required|string'
        // ]);

        $style = new Mesurment;
        $style->style_id = $request->styleId;
        $style->code = $request->code;
        $style->name = $request->name;
        $style->tolerance = $request->tolerance;

        $style->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $measurement = Mesurment::where('id',$id)->first();
        return view("pages.measurement.show",['measurement'=>$measurement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $measurement = Mesurment::where('id',$id)->first();
        $style = Style::all();
        return view("pages.measurement.edit",['measurement'=>$measurement,'style'=>$style]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'code'=>'required|string',
        //     'StyleCategoryId' => 'required|exists:style_categories,id',
        //     'description'=>'required|string'
        // ]);

        $style = Mesurment::where('id',$id)->first();
        $style->style_id = $request->styleId;
        $style->code = $request->code;
        $style->name = $request->name;
        $style->tolerance = $request->tolerance;

        $style->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $style = Mesurment::where('id',$id)->first();
        $style->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
