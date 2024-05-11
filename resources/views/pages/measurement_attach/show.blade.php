@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Measure Attachment"]) !!}
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
    <th>Name</th>
    <td>{{$rm->name}}</td>
  </tr>
  <tr>
    <th>Description</th>
    <td>{{$rm->description}}</td>
  </tr>
  <tr>
  <tr>
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