@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show Buyer"]) !!}

<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$buyer->id}}</td>
  </tr>
  <tr>
    <th>Name</th>
    <td>{{$buyer->name}}</td>
  </tr>
  <tr>
    <th>Phone</th>
    <td>{{$buyer->mobile}}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{$buyer->email}}</td>
  </tr>
  <tr>
    <th>Address</th>
    <td>{{$buyer->address}}</td>
  </tr>
  <tr>
    <th>Photo</th>
    <td>
        <img src="{{ asset('img/'.$buyer->photo) }}" alt="image" width="80"/>
    </td>
  </tr>
</table>

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection