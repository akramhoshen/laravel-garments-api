@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Create Product","button"=>"Manage Product","route"=>url("products")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"products"]) !!}

{!! Page::content_body() !!}

{!! Form::text(["name"=>"name","label"=>"Name","value"=>old('name')]) !!}

@if($errors->has('name'))
    <span class='text-danger'>{{$errors->first('name')}}</span>
@endif

{!! Form::text(["name"=>"description","label"=>"Description","value"=>old('description')]) !!}

@if($errors->has('description'))
    <span class='text-danger'>{{$errors->first('description')}}</span>
@endif

{!! Form::field(["label"=>"Photo","type"=>"file","name"=>"image"]) !!}

@if($errors->has('image'))
    <span class='text-danger'>{{$errors->first('image')}}</span>
@endif

{!! Form::field(["name"=>"price","type"=>"number","label"=>"Price","value"=>old('price')]) !!}

@if($errors->has('price'))
    <span class='text-danger'>{{$errors->first('price')}}</span>
@endif

{!! Form::select(["label"=>"Product Category","name"=>"ProductCategoryId","table"=>$categories]) !!}

@if($errors->has('ProductCategoryId'))
    <span class='text-danger'>{{$errors->first('ProductCategoryId')}}</span>
@endif
{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Create"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection