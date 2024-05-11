<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(){
        return view('pages.user.login');
    }
     public function index()
    {
        // $html="<form action='".url("/users/1")."' method='post'>";
        // $html.="<input type='hidden' name='_token' value='".csrf_token()."' />";
        // $html.="<input type='submit' name='_method' value='delete' />";
        // $html.="</form>";
        // //$html.="<a href=".url("/users/1/edit").">Edit</a> |";
        // $html.="<a href='".route('users.edit',1)."'>Edit</a> |";
        // $html.="<a href=".url("/users/1").">Show</a>";
        // echo $html;
        return view("pages.user.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $html="<form action='".url("/users")."' method='post'>";
        // $html.="<input type='hidden' name='_token' value='".csrf_token()."' />";
        // $html.="<input type='submit' name='submit' value='Save' />";
        // $html.="</form>";
        // echo $html;
        return view("pages.user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo $request->name;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo "Show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $html="<form action='".url("/users/1")."' method='post'>";
        // $html.="<input type='hidden' name='_method' value='put' />";
        // $html.="<input type='hidden' name='_token' value='".csrf_token()."' />";
        // $html.="<input type='submit' name='submit' value='Update' />";
        // $html.="</form>";
        // echo $html;

        return view("pages.user.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo $request->name." Updated";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        echo "Destroy";
    }
}
