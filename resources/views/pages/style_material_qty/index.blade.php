@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Style Material Quantity","button"=>"Create Style Material Quantity","route"=>url("smquantities/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($stsize,["id","style",'raw_material',"size","quantity"],"smquantities") !!}

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$stsize->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection