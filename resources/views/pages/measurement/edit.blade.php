@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Measurement","button"=>"Manage Measurement","route"=>url("measurements")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"measurements/$measurement->id","method"=>"PUT"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"styleId","value"=>$measurement->style_id,"table"=>$style]) !!}

@if($errors->has('styleId'))
    <span class='text-danger'>{{$errors->first('styleId')}}</span>
@endif

{!! Form::text(["name"=>"code","label"=>"Code","value"=>old('code',$measurement->code)]) !!}
@if($errors->has('code'))
    <span class='text-danger'>{{$errors->first('code')}}</span>
@endif

{!! Form::text(["name"=>"name","label"=>"Name","value"=>old('name',$measurement->name)]) !!}
@if($errors->has('name'))
    <span class='text-danger'>{{$errors->first('name')}}</span>
@endif

{!! Form::text(["name"=>"tolerance","label"=>"Tolerance","value"=>old('tolerance',$measurement->tolerance)]) !!}
@if($errors->has('tolerance'))
    <span class='text-danger'>{{$errors->first('tolerance')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection