@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Vendor","button"=>"Create Vendor","route"=>url("vendors/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($vendor,["id","organization","contact_person","phone","email","address"],"vendors") !!} 

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$vendor->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection