<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;

Class RoleController extends Controller{
    public function index(){

        //print_r(Role::all());
        return view("pages.role.index",["roles"=>Role::all()]);
    }
    public function create(){

        //print_r(Role::all());
        return view("pages.role.create");
    }
    public function store(Request $request){
        //echo $request->name;
        $r =new Role();
        $r->name=$request->name;
        $r->save();

        return redirect()->route("roles.index")->with('success','Success.');
    }
    public function show(string $id){
        echo "Show:".$id;
    }
    public function edit(string $id){
        // return view("pages.role.edit");
        echo "Edit:".$id;
    }
    public function update(Request $request,string $id){
        // return view("pages.role.edit");
        echo "Update:".$id;
    }
    public function delete($id){
        echo "Delete:$id";
      }
    public function destroy(string $id){
        echo "Destroy";
    }
}