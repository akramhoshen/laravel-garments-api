@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Show vendor","button"=>"Manage Vendor","route"=>url("vendors")]) !!}
{!! Page::content_body() !!}
<table class='table'>
  <tr>
    <th>ID</th>
    <td>{{$vendor->id}}</td>
  </tr>
  <tr>
    <th>Organization</th>
    <td>{{$vendor->organization}}</td>
  </tr>
  <tr>
    <th>Contact Person</th>
    <td>{{$vendor->contact_person}}</td>
  </tr>
  <tr>
    <th>Phone</th>
    <td>{{$vendor->phone}}</td>
  </tr>
  <tr>
    <th>Email</th>
    <td>{{$vendor->email}}</td>
  </tr>
  <tr>
    <th>Address</th>
    <td>{{$vendor->address}}</td>
  </tr>
</table>
{!! Page::content_body_close() !!}
{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection