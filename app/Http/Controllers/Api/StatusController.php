<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Statu;
use Illuminate\Support\Facades\DB;

use function Termwind\style;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return response()->json(["status"=>Statu::All()]);

        return response()->json(Statu::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user=new Style();
        // $user->code=$request->code;
        // $user->description=$request->description;
        // $user->style_category_id=$request->StyleCategoryId;

        // $user->save();
        // return response()->json('Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return json_encode(Statu::find($id));
    }

    public function edit(string $id)
    {
        // return response()->json(Style::where($id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $style = Style::where('id',$id)->first();
        // $style->code = $request->code;
        // $style->style_category_id = $request->style_category_id;
        // $style->description = $request->description;

        // $style->update();
        // return response()->json('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $style = Style::where('id',$id)->first();
        // $style->delete();
        // return response()->json('Successfully Deleted');
    }
}
