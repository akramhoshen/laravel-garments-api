<?php

namespace App\Http\Controllers;

use App\Models\MeasurementSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Style;
use App\Models\Size;
use App\Models\Mesurment;
use App\Models\Fabric;

use function Termwind\style;

class TechPacksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mtsize = DB::table('measurement_sizes as ms')
        ->join('styles as s','s.id','=','ms.style_id')
        ->join('mesurments as m','m.id','=','ms.measurement_id')
        ->join('sizes as si','si.id','=','ms.size_id')
        ->select('ms.id','s.code as style','m.name as measurement_name','si.name as size','ms.measurement')
        ->paginate(8);
        return view("pages.tech-pack.index",['mtsize'=>$mtsize]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $style = style::all();
        $size = Size::all();
        $measurement = Mesurment::all();
        return view("pages.measurement_size.create",['style'=>$style,'size'=>$size,'measurement'=>$measurement]);
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

        $style = new MeasurementSize;
        $style->style_id = $request->styleId;
        $style->measurement_id = $request->measurementId;
        $style->size_id = $request->sizeId;
        $style->measurement = $request->measurement;

        $style->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $style = Style::where('id',$id)->first();
        $style = DB::table('styles as st')
        ->join('style_categories as sc', 'sc.id', '=', 'st.style_category_id')
        ->select('st.id', 'st.code', 'sc.name as style_category', 'st.description')
        ->where('st.id', $id)
        ->first();

        $fabrics = DB::table('fabrics as f')
        ->join('styles as st', 'st.id', '=', 'f.style_id')
        ->select('f.name','f.description','f.photo')
        ->where('st.id', $id)
        ->get();

        $trims = DB::table('style_trims as st')
        ->join('styles as s', 's.id', '=', 'st.style_id')
        ->join('trims as t', 't.id', '=', 'st.trim_id')
        ->select('st.id','t.name as trim','st.description','st.photo')
        ->where('s.id', $id)
        ->get();

        $attachments = DB::table('measurement_attachments as m')
        ->join('styles as s', 's.id', '=', 'm.style_id')
        ->select('m.id','m.name','m.photo')
        ->where('s.id', $id)
        ->get();

        // $mssizes = DB::table('measurement_sizes as ms')
        // ->join('styles as s', 's.id', '=', 'ms.style_id')
        // ->join('mesurments as m', 'm.id', '=', 'ms.measurement_id')
        // ->join('sizes as sz', 'sz.id', '=', 'ms.size_id')
        // ->select('m.code as code','m.name as name','m.tolerance','ms.measurement')
        // ->where('s.id', $id)
        // ->get();

        // $mssizes = DB::table('mesurments as m')
        // ->join('styles as s', 's.id', '=', 'm.style_id')
        // ->join('measurement_sizes as ms', 'ms.measurement_id', '=', 'm.id')
        // ->join('sizes as sz', 'sz.id', '=', 'ms.size_id')
        // ->select('m.code', 'm.name', 'm.tolerance')
        // ->where('s.id', $id)
        // ->get();

        // $measurements = DB::table('measurement_sizes as ms')
        // ->join('sizes as sz', 'sz.id', '=', 'ms.size_id')
        // ->select('sz.name as size', 'ms.measurement')
        // ->get();


        return view("pages.tech-pack.show",['style'=>$style,'fabrics'=>$fabrics,'trims'=>$trims,'attachments'=>$attachments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mtsize = MeasurementSize::where('id',$id)->first();
        $style = style::all();
        $size = Size::all();
        $measurement = Mesurment::all();
        return view("pages.measurement_size.edit",['mtsize'=>$mtsize,'style'=>$style,'size'=>$size,'measurement'=>$measurement]);
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

        $style = MeasurementSize::where('id',$id)->first();
        $style->style_id = $request->styleId;
        $style->measurement_id = $request->measurementId;
        $style->size_id = $request->sizeId;
        $style->measurement = $request->measurement;

        $style->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $style = MeasurementSize::where('id',$id)->first();
        $style->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
