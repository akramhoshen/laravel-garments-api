<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{   
    public function index(Request $request){
        
        return response()->json(Image::all());
    }
    public function store(Request $request)
    {
        //Validate Data
        // $request->validate([
        //     'photo'=>'required|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->move('img/', $imageName);

            Image::create(['name'=>$imageName]);

            // $newimg = new Image;
            // $newimg->name = $imageName;
            // $newimg->save();
        
            return response()->json(['success' => 'Successfully Upload']);
        }        

        return response()->json('Try Again');
    }
}
