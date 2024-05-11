@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Create Raw Material","button"=>"Manage Raw Material","route"=>url("rmaterials")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"rmaterials"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"styleId","table"=>$style]) !!}
@if($errors->has('styleId'))
    <span class='text-danger'>{{$errors->first('styleId')}}</span>
@endif

{!! Form::select(["label"=>"Raw Material Category","name"=>"rmCategoryId","table"=>$categories]) !!}
@if($errors->has('rmCategoryId'))
    <span class='text-danger'>{{$errors->first('rmCategoryId')}}</span>
@endif

{!! Form::text(["name"=>"name","label"=>"Name","value"=>old('name')]) !!}
@if($errors->has('name'))
    <span class='text-danger'>{{$errors->first('name')}}</span>
@endif

{!! Form::text(["name"=>"description","label"=>"Description","value"=>old('description')]) !!}
@if($errors->has('description'))
    <span class='text-danger'>{{$errors->first('description')}}</span>
@endif

{!! Form::select(["label"=>"Unit Of Measure","name"=>"uomId","table"=>$uom]) !!}
@if($errors->has('uomId'))
    <span class='text-danger'>{{$errors->first('uomId')}}</span>
@endif

{!! Form::text(["name"=>"unitPrice","label"=>"Cost Per Unit","value"=>old('unitPrice')]) !!}
@if($errors->has('unitPrice'))
    <span class='text-danger'>{{$errors->first('unitPrice')}}</span>
@endif

{!! Form::field(["label"=>"Photo","type"=>"file","name"=>"photo"]) !!}
@if($errors->has('photo'))
    <span class='text-danger'>{{$errors->first('photo')}}</span>
@endif

{!! Form::select1(["label"=>"Vendor","name"=>"vendorId","table"=>$vendor]) !!}
@if($errors->has('vendorId'))
    <span class='text-danger'>{{$errors->first('vendorId')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Create"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection