@extends('layouts.app')

@section('page')
{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Edit Measurement Size","button"=>"Manage Measurement Size","route"=>url("mtsizes")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"mtsizes/$mtsize->id","method"=>"PUT"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"styleId","value"=>$mtsize->style_id,"table"=>$style]) !!}
@if($errors->has('styleId'))
    <span class='text-danger'>{{$errors->first('styleId')}}</span>
@endif

{!! Form::select(["label"=>"Measurement_Name","name"=>"measurementId","value"=>$mtsize->measurement_id,"table"=>$measurement]) !!}
@if($errors->has('measurementId'))
    <span class='text-danger'>{{$errors->first('measurementId')}}</span>
@endif

{!! Form::select(["label"=>"Size","name"=>"sizeId","value"=>$mtsize->size_id,"table"=>$size]) !!}
@if($errors->has('sizeId'))
    <span class='text-danger'>{{$errors->first('sizeId')}}</span>
@endif

{!! Form::text(["name"=>"measurement","label"=>"Measurement","value"=>old('measurement',$mtsize->measurement)]) !!}
@if($errors->has('measurement'))
    <span class='text-danger'>{{$errors->first('measurement')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection