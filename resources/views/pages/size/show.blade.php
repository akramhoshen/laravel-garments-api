@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Size"]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$trim->id}}</td>
  </tr>
  <tr>
    <th>Name</th>
    <td>{{$trim->name}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection