@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Add Buyer","button"=>"Manage Buyer","route"=>url("buyers")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"buyers/$buyer->id","method"=>"PUT"]) !!}

{!! Page::content_body() !!}

{!! Form::text(["name"=>"name","label"=>"Name","value"=>old('name',$buyer->name)]) !!}
@if($errors->has('name'))
    <span class='text-danger'>{{$errors->first('name')}}</span>
@endif

{!! Form::text(["name"=>"mobile","label"=>"Mobile","value"=>old('mobile',$buyer->mobile)]) !!}
@if($errors->has('mobile'))
    <span class='text-danger'>{{$errors->first('mobile')}}</span>
@endif

{!! Form::text(["name"=>"email","label"=>"email","value"=>old('email',$buyer->email)]) !!}
@if($errors->has('email'))
    <span class='text-danger'>{{$errors->first('email')}}</span>
@endif

{!! Form::text(["name"=>"address","label"=>"Address","value"=>old('address',$buyer->address)]) !!}
@if($errors->has('address'))
    <span class='text-danger'>{{$errors->first('address')}}</span>
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