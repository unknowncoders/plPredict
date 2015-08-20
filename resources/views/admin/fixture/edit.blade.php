@extends('admin.layouts.master')

@section('title')

@stop

@section('header')
@stop

@section('content')

    <div class="col-sm-12 col-md-8 col-md-offset-2">
        
                    <h2> Edit the fixture </h2>
                    {!! Form::model($fixture,['method'=>'PATCH','action'=>['Admin\FixtureController@update',$fixture->id]]) !!}
                            @include ('admin.fixture.form',['submitText'=>'Done','gameweekId'=>null])
                    {!! Form::close() !!}

                    @include ('errors.list')
    </div>


@stop
