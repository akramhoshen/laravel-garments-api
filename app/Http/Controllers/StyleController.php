<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Style;
use App\Models\StyleCategorie;
class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $styles = DB::table('styles as s')
        ->join('style_categories as sc','sc.id','=','s.style_category_id')
        ->select('s.id','s.code','s.description','sc.name as category')
        ->paginate(5);
        return view("pages.style.index",['styles'=>$styles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $categories = StyleCategorie::all();
        return view("pages.style.create",['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|string',
            'StyleCategoryId' => 'required|exists:style_categories,id',
            'description'=>'required|string'
        ]);

        $style = new Style;
        $style->code = $request->code;
        $style->style_category_id = $request->StyleCategoryId;
        $style->description = $request->description;

        $style->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $style = Style::where('id',$id)->first();
        return view("pages.style.show",['style'=>$style]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $style = Style::where('id',$id)->first();
        $categories = StyleCategorie::all();
        return view("pages.style.edit",['style'=>$style,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code'=>'required|string',
            'StyleCategoryId' => 'required|exists:style_categories,id',
            'description'=>'required|string'
        ]);

        $style = Style::where('id',$id)->first();
        $style->code = $request->code;
        $style->style_category_id = $request->StyleCategoryId;
        $style->description = $request->description;

        $style->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $style = Style::where('id',$id)->first();
        $style->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
