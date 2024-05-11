@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Create Style Material Quantity","button"=>"Manage Style Material Quantity","route"=>url("smquantities")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"smquantities"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"styleId","table"=>$style]) !!}
@if($errors->has('styleId'))
    <span class='text-danger'>{{$errors->first('styleId')}}</span>
@endif

{!! Form::select(["label"=>"Raw Material","name"=>"rmId","table"=>$rm]) !!}
@if($errors->has('rmId'))
    <span class='text-danger'>{{$errors->first('rmId')}}</span>
@endif

{!! Form::select(["label"=>"Size","name"=>"sizeId","table"=>$size]) !!}
@if($errors->has('sizeId'))
    <span class='text-danger'>{{$errors->first('sizeId')}}</span>
@endif

{!! Form::text(["name"=>"qty","label"=>"Qty","value"=>old('qty')]) !!}
@if($errors->has('qty'))
    <span class='text-danger'>{{$errors->first('qty')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Create"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection