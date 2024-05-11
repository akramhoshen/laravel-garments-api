@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Measurement Size"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$mtsize->id}}</td>
  </tr>
  <tr>
    <th>Style_Id</th>
    <td>{{$mtsize->style_id}}</td>
  </tr>
  <tr>
    <th>Measurement_Id</th>
    <td>{{$mtsize->measurement_id}}</td>
  </tr>
  <tr>
    <th>Size_Id</th>
    <td>{{$mtsize->size_id}}</td>
  </tr>
  <tr>
    <th>Measurement</th>
    <td>{{$mtsize->measurement}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection