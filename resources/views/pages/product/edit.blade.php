@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Product","button"=>"Manage Product","route"=>url("products")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"products/$product->id","method"=>"PUT"]) !!}

{!! Page::content_body() !!}

{!! Form::text(["name"=>"name","label"=>"Name","value"=>old('name',$product->name)]) !!}

@if($errors->has('name'))
    <span class='text-danger'>{{$errors->first('name')}}</span>
@endif

{!! Form::text(["name"=>"description","label"=>"Description","value"=>old('description',$product->description)]) !!}

@if($errors->has('description'))
    <span class='text-danger'>{{$errors->first('description')}}</span>
@endif

{!! Form::field(["label"=>"Photo","type"=>"file","name"=>"image"]) !!}

@if($errors->has('image'))
    <span class='text-danger'>{{$errors->first('image')}}</span>
@endif

{!! Form::field(["name"=>"price","type"=>"number","label"=>"Price","value"=>old('price',$product->price)]) !!}

@if($errors->has('price'))
    <span class='text-danger'>{{$errors->first('price')}}</span>
@endif

{!! Form::select(["label"=>"Product Category","name"=>"ProductCategoryId","value"=>$product->category_id,"table"=>$categories]) !!}

@if($errors->has('ProductCategoryId'))
    <span class='text-danger'>{{$errors->first('ProductCategoryId')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection