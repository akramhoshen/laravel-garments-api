@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Measurement Size","button"=>"Create Measurement Size","route"=>url("mtsizes/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($mtsize,["id","style","measurement_name","size","measurement"],"mtsizes") !!}

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$mtsize->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection