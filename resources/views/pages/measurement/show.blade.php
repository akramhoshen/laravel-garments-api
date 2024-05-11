@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Measurement"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$measurement->id}}</td>
  </tr>
  <tr>
    <th>Style</th>
    <td>{{$measurement->style_id}}</td>
  </tr>
  <tr>
    <th>Size</th>
    <td>{{$measurement->code}}</td>
  </tr>
  <tr>
    <th>Size</th>
    <td>{{$measurement->name}}</td>
  </tr>
  <tr>
    <th>Size</th>
    <td>{{$measurement->tolerance}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection