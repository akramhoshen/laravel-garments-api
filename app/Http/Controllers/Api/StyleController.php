<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Style;
use Illuminate\Support\Facades\DB;

use function Termwind\style;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $styles = DB::table('styles as s')
        ->join('style_categories as sc', 'sc.id', '=', 's.style_category_id')
        ->select('s.id', 's.code', 's.description', 'sc.name as category')
        ->get();

        return response()->json($styles);

        // return response()->json(Style::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=new Style();
        $user->code=$request->code;
        $user->description=$request->description;
        $user->style_category_id=$request->StyleCategoryId;

        $user->save();
        return response()->json('Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return json_encode(Style::find($id));
    }

    public function edit(string $id)
    {
        return response()->json(Style::where($id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $style = Style::where('id',$id)->first();
        $style->code = $request->code;
        $style->style_category_id = $request->style_category_id;
        $style->description = $request->description;

        $style->update();
        return response()->json('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $style = Style::where('id',$id)->first();
        $style->delete();
        return response()->json('Successfully Deleted');
    }
}
