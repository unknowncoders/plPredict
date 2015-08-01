@extends('admin.layouts.master')

@section('title')

@stop

@section('header')
        <link rel="stylesheet" href="{{ URL::asset('css/admin/pichelper.css') }}">
@stop

@section('content')

    <div class="col-sm-12 col-md-8 col-md-offset-2">
        
                    <h2> Edit the picture (ID:{{ $pic->id }}) </h2>
                    {!! Form::model($pic,['method'=>'PATCH','action'=>['Admin\PicController@update',$pic->id]]) !!}
                            @include ('admin.pic.form',['submitText'=>'Done'])
                    {!! Form::close() !!}

                    @include ('errors.list')
    </div>


@stop
