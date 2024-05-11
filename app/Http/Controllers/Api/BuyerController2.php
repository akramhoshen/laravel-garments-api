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
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => 'required|email|unique:buyers,email',
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Image Upload
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'), $photoName);
        } else {
            $photoName = 'photo';
        }

        $buyer = new Buyer;
        $buyer->name = $request->name;
        $buyer->mobile = $request->mobile;
        $buyer->email = $request->email;
        $buyer->address = $request->address;
        $buyer->photo = $photoName;

        $buyer->save();

        return response()->json($buyer, 200);
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
    // public function update(Request $request, string $id)
    // {
    //     // $request->validate([
    //     //     'name' => 'required|string|max:255',
    //     //     'mobile' => 'required|string|max:20',
    //     //     'email' => 'required|email|unique:buyers,email',
    //     //     'address' => 'required|string|max:255',
    //     //     // 'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //     // ]);

        
        
    //     // // Image Upload
    //     // if ($request->hasFile('photo')) {
    //     //     $photoName = time().'.'.$request->photo->extension();
    //     //     $request->photo->move(public_path('img'), $photoName);
    //     // }

    //     // $buyer = Buyer::where('id',$id)->first();

    //     // $buyer->name = $request->name;
    //     // $buyer->mobile = $request->mobile;
    //     // $buyer->email = $request->email;
    //     // $buyer->address = $request->address;
    //     // $buyer->photo = $photoName;

    //     // $buyer->update();

    //     // // return response()->json($buyer, 201);
    //     // return response()->json('success');
    // }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'mobile' => 'required|string|max:20',
        'email' => 'required|email|unique:buyers,email,'.$id,
        'address' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $buyer = Buyer::findOrFail($id);

    $buyer->name = $request->name;
    $buyer->mobile = $request->mobile;
    $buyer->email = $request->email;
    $buyer->address = $request->address;

    if ($request->hasFile('photo')) {
        $photoName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('img'), $photoName);
        $buyer->photo = $photoName;
    }

    $buyer->save();

    return response()->json($buyer, 200);
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
