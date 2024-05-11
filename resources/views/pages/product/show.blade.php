@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Product"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$product->id}}</td>
  </tr>
  <tr>
    <th>Name</th>
    <td>{{$product->name}}</td>
  </tr>
  <tr>
    <th>Description</th>
    <td>{{$product->description}}</td>
  </tr>
  <tr>
    <th>Image</th>
    <td>
        <img src="{{ asset('img/'.$product->image) }}" alt="image" width="80"/>
    </td>
  </tr>
  <tr>
    <th>Price</th>
    <td>{{$product->price}}</td>
  </tr>
  <tr>
    <th>Category_Id</th>
    <td>{{$product->category_id}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection