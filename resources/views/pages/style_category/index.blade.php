@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Category","button"=>"Create Category","route"=>url("categories/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($categories,["id","name"],"categories") !!} 

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$categories->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection