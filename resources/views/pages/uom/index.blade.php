@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Unit Of Measure","button"=>"Create Unit Of Measure","route"=>url("uoms/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($categories,["id","name"],"uoms") !!} 

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$categories->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection