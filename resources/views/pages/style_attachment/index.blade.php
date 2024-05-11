@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Manage Style Attachment","button"=>"Create Style Attachment","route"=>url("styleattachments/create")]) !!}

{!! Page::content_body() !!}

{!! Table::get_array_table($attachments,["id","style","attachment"],"styleattachments") !!} 

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{{$attachments->links('pagination::bootstrap-5')}}

{!! Page::content_footer_close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection