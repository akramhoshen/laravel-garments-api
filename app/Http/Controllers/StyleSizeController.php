<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Style;
use App\Models\Size;
use App\Models\StyleSize;

use function Termwind\style;

class StyleSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stsize = DB::table('style_sizes as ss')
        ->join('styles as s','s.id','=','ss.style_id')
        ->join('sizes as si','si.id','=','ss.size_id')
        ->select('ss.id','s.code as style','si.name as size')
        ->paginate(5);
        return view("pages.style_size.index",['stsize'=>$stsize]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $style = style::all();
        $size = Size::all();
        return view("pages.style_size.create",['style'=>$style,'size'=>$size]);
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

        $style = new StyleSize;
        $style->style_id = $request->styleId;
        $style->size_id = $request->sizeId;

        $style->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stsize = StyleSize::where('id',$id)->first();
        return view("pages.style_size.show",['stsize'=>$stsize]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stsize = StyleSize::where('id',$id)->first();
        $style = Style::all();
        $size = Size::all();
        return view("pages.style_size.edit",['stsize'=>$stsize,'style'=>$style,'size'=>$size]);
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

        $style = StyleSize::where('id',$id)->first();
        $style->style_id = $request->styleId;
        $style->size_id = $request->sizeId;

        $style->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $style = StyleSize::where('id',$id)->first();
        $style->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
