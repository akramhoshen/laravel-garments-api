@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Create Vendor","button"=>"Manage Vendor","route"=>url("vendors")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"vendors"]) !!}

{!! Page::content_body() !!}

{!! Form::text(["name"=>"organization","label"=>"Organization","value"=>old('organization')]) !!}

@if($errors->has('organization'))
    <span class='text-danger'>{{$errors->first('organization')}}</span>
@endif

{!! Form::text(["name"=>"contact_person","label"=>"Contact Person","value"=>old('contact_person')]) !!}

@if($errors->has('contact_person'))
    <span class='text-danger'>{{$errors->first('contact_person')}}</span>
@endif

{!! Form::text(["name"=>"phone","label"=>"Phone","value"=>old('phone')]) !!}

@if($errors->has('phone'))
    <span class='text-danger'>{{$errors->first('phone')}}</span>
@endif

{!! Form::text(["name"=>"email","label"=>"Email","value"=>old('email')]) !!}

@if($errors->has('email'))
    <span class='text-danger'>{{$errors->first('email')}}</span>
@endif

{!! Form::text(["name"=>"address","label"=>"Address","value"=>old('address')]) !!}

@if($errors->has('address'))
    <span class='text-danger'>{{$errors->first('address')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Create"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection