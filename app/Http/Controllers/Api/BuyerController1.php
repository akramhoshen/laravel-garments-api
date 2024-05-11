<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;

use function Termwind\style;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return response()->json(["buyers"=>Buyer::All()]);

        return response()->json(Buyer::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Image Upload
        // $photoName = time().'.'.$request->photo->extension();
        // $request->photo->move(public_path('img'),$photoName);

        $buyer = new Buyer;
        $buyer->name = $request->name;
        $buyer->mobile = $request->mobile;
        $buyer->email = $request->email;
        $buyer->address = $request->address;
        $buyer->photo = 'photo';

        $buyer->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return json_encode(Buyer::find($id));
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
