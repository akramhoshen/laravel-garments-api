<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(["users"=>User::All()]);
    }

    // public function login(Request $request){
          
    //     // $user=User::where('name',$request->name)->first();
    //     // $hash=$user->password;
  
    //     // if(password_verify($request->password, $hash)){
    //     //     return response()->json(["user"=>$user]);
    //     // }else{
    //     //     return response()->json(["user"=>null]);
    //     // }      
    //     // return response()->json(["user"=>$request->name]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->full_name=$request->full_name;
        $user->password=$request->password;
        $user->mobile=$request->mobile;   
        if(isset($request->photo)){
            $user->photo=$request->photo;
         }  

        $user->save();

        if(isset($request->photo)){
			$imageName = $user->id.'.'.$request->photo->extension();
			$user->photo=$imageName;
            $user->update();
			$request->photo->move(public_path('img'),$imageName);
		}

        

        return response()->json_encode(["user"=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json_encode(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $user=User::find($id);       
           //$user->name=$request->name;
        //   $user->email=$request->email;
        //   $user->full_name=$request->full_name;
        //   $user->password=$request->password;
        //   $user->mobile=$request->mobile;   
        //  if(isset($request->photo)){
        //      $user->photo=$request->photo;
        //   }  

         //$user->update();

        // if(isset($request->photo)){
		// 	$imageName = $user->id.'.'.$request->photo->extension();
		// 	$user->photo=$imageName;
        //     $user->update();
		// 	$request->photo->move(public_path('img'),$imageName);
		// }

        return response()->json_encode(["user"=>$user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
		return response()->json_encode(["success"=>$id]);
    }
}
