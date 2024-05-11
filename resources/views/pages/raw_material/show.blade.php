@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Raw Material"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$rm->id}}</td>
  </tr>
  <tr>
    <th>Style</th>
    <td>{{$rm->style_id}}</td>
  </tr>
  <tr>
    <th>Raw Material Category</th>
    <td>{{$rm->rm_category_id}}</td>
  </tr>
  <tr>
    <th>Name</th>
    <td>{{$rm->name}}</td>
  </tr>
  <tr>
    <th>Description</th>
    <td>{{$rm->description}}</td>
  </tr>
  <tr>
  <tr>
    <th>Unit Of Measure</th>
    <td>{{$rm->uom_id}}</td>
  </tr>
  <tr>
  <tr>
    <th>Cost Per Unit</th>
    <td>{{$rm->unit_price}}</td>
  </tr>
  <tr>
    <th>Photo</th>
    <td>
        <img src="{{ asset('img/'.$rm->photo) }}" alt="photo" width="80"/>
    </td>
  </tr>
  <tr>
    <th>Vendor_Id</th>
    <td>{{$rm->vendor_id}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection