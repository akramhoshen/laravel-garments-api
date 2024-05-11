@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Style Attachment","button"=>"Manage Style Attachment","route"=>url("styleattachments")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"styleattachments/$attachment->id","method"=>"PUT"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"StyleId","value"=>$attachment->style_id,"table"=>$style]) !!}

@if($errors->has('StyleId'))
    <span class='text-danger'>{{$errors->first('StyleId')}}</span>
@endif

{!! Form::field(["label"=>"Attachment","type"=>"file","name"=>"attachment"]) !!}

@if($errors->has('attachment'))
    <span class='text-danger'>{{$errors->first('attachment')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection