@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Style Attachment","button"=>"Manage Style Attachment","route"=>url("styleattachments")]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$attachment->id}}</td>
  </tr>
  <tr>
    <th>Style</th>
    <td>{{$attachment->style_id}}</td>
  </tr>
  <tr>
    <th>Attachment</th>
    <td>
        <img src="{{ asset('img/'.$attachment->attachment) }}" alt="image" width="80"/>
    </td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection