@extends('admin.layouts.master')

@section('title')

@stop

@section('header')
        <link rel="stylesheet" href="{{ URL::asset('css/admin/badgehelper.css') }}">
@stop

@section('content')

    <div class="col-sm-12 col-md-8 col-md-offset-2">
        
                    <h2> Edit the badge (ID:{{ $badge->id }}) </h2>
                    {!! Form::model($badge,['method'=>'PATCH','action'=>['Admin\BadgeController@update',$badge->id]]) !!}
                            @include ('admin.badge.form',['submitText'=>'Done','defaultPath'=> $badge->getRawIconPath() ])
                    {!! Form::close() !!}

                    @include ('errors.list')
    </div>


@stop
