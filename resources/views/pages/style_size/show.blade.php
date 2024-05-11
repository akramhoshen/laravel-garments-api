@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Style Size"]) !!}
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
    <th>Size</th>
    <td>{{$stsize->size_id}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection