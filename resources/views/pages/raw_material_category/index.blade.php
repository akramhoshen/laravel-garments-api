@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Raw Material Category","button"=>"Create Raw Material Category","route"=>url("rmcategories/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($categories,["id","name"],"rmcategories") !!} 

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$categories->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection