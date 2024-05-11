@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Size","button"=>"Create Size","route"=>url("sizes/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($trim,["id","name"],"sizes") !!} 

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$trim->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection