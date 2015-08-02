@extends('admin.layouts.master')

@section('title')
    Club 
@stop

@section('header')
        <link rel="stylesheet" href="{{ URL::asset('css/admin/clubhelper.css') }}">
@stop


@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <h2>Add a club</h2>
                            {!! Form::open(['action'=>'Admin\ClubController@store']) !!}
                                    @include ('admin.club.form',['submitText'=>'Create'])
                            {!! Form::close() !!}

                            @include ('errors.list')
            </div>

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <h2> All clubs </h2>
                    @foreach($clubs as $club)
                            <div class="col-sm-6">
                                            <div class="club-unit">
                                                        
                                                <div class="club-pic-label"> {{ $club->name }} </div>
                                            
                                                <div class="club-img-container col-sm-6">
                                                        <img class="club-img" src="pics/{{ $club->pic->path }}"/>
                                                        <div class="club-pic-label">Logo: {{ $club->pic->path }} </div>
                                                </div>
                                                <div class="club-img-container col-sm-6">
                                                        <img class="club-img" src="pics/{{ $club->fanPic->path }}"/>
                                                        <div class="club-pic-label">FanPic: {{ $club->fanPic->path }} </div>
                                                </div>
                                                    
                                                    <div class="club-pic-label">
                                                            <button class="btn btn-primary"><a href="{{ route('admin.club.edit',$club->id)}}">Edit</a></button>
                                                            <div>
                                                                    {!! Form::open(['action'=>['Admin\ClubController@destroy',$club->id],'method'=>'DELETE']) !!}
                                                                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                                                    {!! Form::close() !!}
                                                            </div>
                                                    </div>
                                            </div>
                            </div>
                    @endforeach
            </div>


@stop

