@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Order","button"=>"Manage Order","route"=>url("orders")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"orders/$order->id","method"=>"PUT"]) !!}

{!! Page::content_body() !!}

{!! Form::text(["name"=>"code","label"=>"Code","value"=>old('code',$style->code)]) !!}

@if($errors->has('code'))
    <span class='text-danger'>{{$errors->first('code')}}</span>
@endif

{!! Form::text(["name"=>"description","label"=>"Description","value"=>old('description',$style->description)]) !!}

@if($errors->has('description'))
    <span class='text-danger'>{{$errors->first('description')}}</span>
@endif


{!! Form::select(["label"=>"style","name"=>"Style_Id","value"=>$order->style_id,"table"=>$categories]) !!}

@if($errors->has('StyleCategoryId'))
    <span class='text-danger'>{{$errors->first('StyleCategoryId')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection