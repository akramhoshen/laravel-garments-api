@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Style Material Quantity"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$stsize->id}}</td>
  </tr>
  <tr>
    <th>Style</th>
    <td>{{$stsize->style_id}}</td>
  </tr>
  <tr>
    <th>Raw Material</th>
    <td>{{$stsize->raw_material_id}}</td>
  </tr>
  <tr>
    <th>Size</th>
    <td>{{$stsize->size_id}}</td>
  </tr>
  <tr>
    <th>Qty</th>
    <td>{{$stsize->quantity}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection