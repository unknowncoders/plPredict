@extends('admin.layouts.master')

@section('title')

@stop

@section('header')
        <link rel="stylesheet" href="{{ URL::asset('css/admin/clubhelper.css') }}">
@stop

@section('content')

    <div class="col-sm-12 col-md-8 col-md-offset-2">
        
                    <h2> Edit the club (ID:{{ $club->id }}) </h2>
                    {!! Form::model($club,['method'=>'PATCH','action'=>['Admin\ClubController@update',$club->id]]) !!}
                            @include ('admin.club.form',['submitText'=>'Done'])
                    {!! Form::close() !!}

                    @include ('errors.list')
    </div>


@stop
