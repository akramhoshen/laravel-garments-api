@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Create Measure Attachment","button"=>"Manage Measure Attachment","route"=>url("mtattachments")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"mtattachments"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"styleId","table"=>$style]) !!}
@if($errors->has('styleId'))
    <span class='text-danger'>{{$errors->first('styleId')}}</span>
@endif

{!! Form::text(["name"=>"name","label"=>"Name","value"=>old('name')]) !!}
@if($errors->has('name'))
    <span class='text-danger'>{{$errors->first('name')}}</span>
@endif

{!! Form::field(["label"=>"Photo","type"=>"file","name"=>"photo"]) !!}
@if($errors->has('photo'))
    <span class='text-danger'>{{$errors->first('photo')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Create"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection