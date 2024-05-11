<?php

namespace App\Http\Controllers;

use App\Models\RawMaterialCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Style;
use App\Models\Size;
use App\Models\RawMaterial;
use App\Models\StyleMaterialQuantitie;

use function Termwind\style;

class StyleMaterialQtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stsize = DB::table('style_material_quantities as sm')
        ->join('styles as s','s.id','=','sm.style_id')
        ->join('sizes as si','si.id','=','sm.size_id')
        ->join('raw_materials as rm','rm.id','=','sm.raw_material_id')
        ->select('sm.id','s.code as style','si.name as size','rm.name as raw_material','sm.quantity')
        ->paginate(5);
        return view("pages.style_material_qty.index",['stsize'=>$stsize]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $style = style::all();
        $size = Size::all();
        $rm = RawMaterial::all();
        return view("pages.style_material_qty.create",['style'=>$style,'size'=>$size,'rm'=>$rm]);
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

        $style = new StyleMaterialQuantitie;
        $style->style_id = $request->styleId;
        $style->raw_material_id = $request->rmId;
        $style->size_id = $request->sizeId;
        $style->quantity = $request->qty;

        $style->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stsize = StyleMaterialQuantitie::where('id',$id)->first();
        return view("pages.style_material_qty.show",['stsize'=>$stsize]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stsize = StyleMaterialQuantitie::where('id',$id)->first();
        $style = Style::all();
        $size = Size::all();
        $rm = RawMaterial::all();
        return view("pages.style_material_qty.edit",['stsize'=>$stsize,'style'=>$style,'size'=>$size,'rm'=>$rm]);
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

        $style = StyleMaterialQuantitie::where('id',$id)->first();
        $style->style_id = $request->styleId;
        $style->raw_material_id = $request->rmId;
        $style->size_id = $request->sizeId;
        $style->quantity = $request->qty;

        $style->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $style = StyleMaterialQuantitie::where('id',$id)->first();
        $style->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
