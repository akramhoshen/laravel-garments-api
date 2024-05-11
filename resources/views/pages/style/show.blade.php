@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Style"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$style->id}}</td>
  </tr>
  <tr>
    <th>Code</th>
    <td>{{$style->code}}</td>
  </tr>
  <tr>
    <th>Category</th>
    <td>{{$style->style_category_id}}</td>
  </tr>
  <tr>
    <th>Description</th>
    <td>{{$style->description}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection