@extends('admin.layouts.master')

@section('title')
    Picture 
@stop

@section('header')
        <link rel="stylesheet" href="{{ URL::asset('css/admin/pichelper.css') }}">
@stop


@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <h2>Add a pic</h2>
                            {!! Form::open(['action'=>'Admin\PicController@store']) !!}
                                    @include ('admin.pic.form',['submitText'=>'Create'])
                            {!! Form::close() !!}

                            @include ('errors.list')
            </div>

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <h2> All pics </h2>
                    @foreach($pics as $pic)
                            <div class="pic-unit col-sm-6">
                                    <img class="col-sm-12" src="pics/{{ $pic->path }}"/>
                                    <div class="pic-inner-label">Path: {{ $pic->path }} </div>
                                    <div class="pic-inner-label">
                                            <button class="btn btn-primary"><a href="{{ route('admin.pic.edit',$pic->id)}}">Edit</a></button>
                                            <div>
                                                    {!! Form::open(['action'=>['Admin\PicController@destroy',$pic->id],'method'=>'DELETE']) !!}
                                                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                            </div>
                                    </div>
                            </div>
                    @endforeach
            </div>


@stop

