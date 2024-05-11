@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Style Size","button"=>"Create Style Size","route"=>url("stsizes/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($stsize,["id","style","size"],"stsizes") !!}

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$stsize->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection