<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use function Termwind\style;

class BuyerController extends Controller
{
    public function index()
    {
        // return response()->json(["buyers"=>Buyer::All()]);

        return response()->json(Buyer::paginate(5));
    }

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
            $photoName = 'avatar.png';
        }

        $buyer = new Buyer;
        $buyer->name = $request->name;
        $buyer->mobile = $request->mobile;
        $buyer->email = $request->email;
        $buyer->address = $request->address;
        $buyer->photo = $photoName;

        $buyer->save();

        return response()->json(['message' => 'Created Successfully'], 201);
        // return response()->json($buyer, 201);
    }

    public function show(string $id)
    {
        return json_encode(Buyer::find($id));
    }

    public function edit(string $id)
    {
        // return response()->json(Buyer::where($id)->first());
    }

    public function update(Request $request, string $id)
    {
        // Image Upload
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'), $photoName);
        } else {
            $photoName = 'avatar.png';
        }

        $buyer = Buyer::where('id',$id)->first();
        $buyer->name = $request->name;
        $buyer->mobile = $request->mobile;
        $buyer->email = $request->email;
        $buyer->address = $request->address;
        $buyer->photo = $photoName;

        $buyer->update();

        return response()->json(['message' => 'Updated Successfully'], 200);
        // return response()->json($buyer, 200);
    }

    public function updateBuyer(Request $request,$id){

        $buyer = Buyer::where('id',$id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'email' => [
                'required',
                'email',
                Rule::unique('buyers')->ignore($buyer->id),
            ],
            'address' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Image Upload
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'), $photoName);
            $buyer->photo = $photoName;
        }

        $buyer->name = $request->name;
        $buyer->mobile = $request->mobile;
        $buyer->email = $request->email;
        $buyer->address = $request->address;

        $buyer->update();

        return response()->json(['message' => 'Updated Successfully'], 200);
        // return response()->json($buyer, 200);
        // return json_encode(["success"=>$request->photo->getClientOriginalName(),"ID"=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buyer = Buyer::where('id',$id)->first();
        $buyer->delete();
        return response()->json(['message' => 'Deleted Successfully']);
    }
}
