@extends('layouts.app')

@section('page')

{!! Page::body_open() !!}
{!! Page::content_open(["title"=>"Create Measurement Size","button"=>"Manage Measurement Size","route"=>url("mtsizes")]) !!}
@if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
    </div>
@endif

{!! Form::open_laravel(["route"=>"mtsizes"]) !!}

{!! Page::content_body() !!}

{!! Form::select1(["label"=>"Style","name"=>"styleId","table"=>$style]) !!}
@if($errors->has('styleId'))
    <span class='text-danger'>{{$errors->first('styleId')}}</span>
@endif

{!! Form::select(["label"=>"Measurement_Id","name"=>"measurementId","table"=>$measurement]) !!}
@if($errors->has('measurementId'))
    <span class='text-danger'>{{$errors->first('measurementId')}}</span>
@endif

{!! Form::select(["label"=>"Size","name"=>"sizeId","table"=>$size]) !!}
@if($errors->has('sizeId'))
    <span class='text-danger'>{{$errors->first('sizeId')}}</span>
@endif

{!! Form::text(["name"=>"measurement","label"=>"Measurement","value"=>old('measurement')]) !!}
@if($errors->has('measurement'))
    <span class='text-danger'>{{$errors->first('measurement')}}</span>
@endif

{!! Page::content_body_close() !!}

{!! Page::content_footer() !!}

{!! Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Create"]) !!}

{!! Page::content_footer_close() !!}

{!! Form::close() !!}

{!! Page::content_close() !!}
{!! Page::body_close() !!}

@endsection