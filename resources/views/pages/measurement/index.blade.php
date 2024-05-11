@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Measurement","button"=>"Create Measurement","route"=>url("measurements/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($measurement,["id","style_id","code","name","tolerance"],"measurements") !!}

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$measurement->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection