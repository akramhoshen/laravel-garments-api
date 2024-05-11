@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Style Trim","button"=>"Manage Style Trim","route"=>url("sttrims")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"sttrims/$rm->id","method"=>"PUT"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"styleId","value"=>$rm->style_id,"table"=>$style]) !!}
@if($errors->has('styleId'))
    <span class='text-danger'>{{$errors->first('styleId')}}</span>
@endif

{!! Form::select(["label"=>"Trim Id","name"=>"trimId","value"=>$rm->trim_id,"table"=>$trim]) !!}
@if($errors->has('trimId'))
    <span class='text-danger'>{{$errors->first('trimId')}}</span>
@endif

{!! Form::text(["name"=>"description","label"=>"Description","value"=>old('description',$rm->description)]) !!}
@if($errors->has('description'))
    <span class='text-danger'>{{$errors->first('description')}}</span>
@endif

{!! Form::field(["label"=>"Photo","type"=>"file","name"=>"photo"]) !!}
@if($errors->has('photo'))
    <span class='text-danger'>{{$errors->first('photo')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection