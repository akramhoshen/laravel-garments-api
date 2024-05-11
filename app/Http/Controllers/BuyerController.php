<?php

namespace App\Http\Controllers;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers = Buyer::paginate(5);

        return view("pages.buyer.index",['buyers'=>$buyers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.buyer.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate Data
        $request->validate([
            'name'=>'required|string|max:255',
            'mobile'=>'required|string',
            'email'=>'required|string',
            'address'=>'required|string',
            'photo'=>'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //Image Upload
        $photoName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('img'),$photoName);

        $buyer = new Buyer;
        $buyer->name = $request->name;
        $buyer->mobile = $request->mobile;
        $buyer->email = $request->email;
        $buyer->address = $request->address;
        $buyer->photo = $photoName;

        $buyer->save();
        
        return back()->with('success','Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buyer = Buyer::where('id',$id)->first();
        return view("pages.buyer.show",['buyer'=>$buyer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buyer = Buyer::where('id',$id)->first();
        return view("pages.buyer.edit",['buyer'=>$buyer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Validate Data
        $request->validate([
            'name'=>'required|string|max:255',
            'mobile'=>'required|string',
            'email'=>'required|string',
            'address'=>'required|string',
            'photo'=>'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $buyer = Buyer::where('id',$id)->first();

        //photo Upload
        if(isset($request->photo)){
            $photoName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'),$photoName);
            $buyer->photo = $photoName;
        };

        $buyer->name = $request->name;
        $buyer->mobile = $request->mobile;
        $buyer->email = $request->email;
        $buyer->address = $request->address;

        $buyer->update();
        
        return back()->with('success','Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buyer = Buyer::where('id',$id)->first();
        $buyer->delete();

        return back()->with('success','Deleted Successfully.');
    }
}
