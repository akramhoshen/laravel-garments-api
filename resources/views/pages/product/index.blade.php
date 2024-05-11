@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Product","button"=>"Create Product","route"=>url("products/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($products,["id","name","description","image","price","category"],"products") !!} 

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$products->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection