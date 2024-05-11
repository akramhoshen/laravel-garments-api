@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Style Trim"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$rm->id}}</td>
  </tr>
  <tr>
    <th>Style_id</th>
    <td>{{$rm->style_id}}</td>
  </tr>
  <tr>
    <th>Trim_id</th>
    <td>{{$rm->trim_id}}</td>
  </tr>
  <tr>
    <th>Description</th>
    <td>{{$rm->description}}</td>
  </tr>
  <tr>
    <th>Photo</th>
    <td>
        <img src="{{ asset('img/'.$rm->photo) }}" alt="photo" width="80"/>
    </td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection