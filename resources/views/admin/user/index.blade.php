@extends('admin.layouts.master')

@section('title')
    Users 
@stop

@section('header')
@stop


@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <h2>Add an admin</h2>
                            {!! Form::open(['action'=>'Admin\AdminController@store']) !!}
                                <div class="form-group">
                                        {!!Form::label('username','Username:') !!}
                                        {!!Form::text('username',null,['class'=>'form-control']) !!}
                                </div>

                                <div class="form-group">
                                        {!! Form::submit("Add",['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}

                            @include ('errors.list')
            </div>

            <div class="col-sm-12 col-md-8 col-md-offset-2"></div>


@stop

