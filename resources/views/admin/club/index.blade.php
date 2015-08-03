@extends('admin.layouts.master')

@section('title')
    Club 
@stop

@section('header')
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
                                            <div class="resource-unit">
                                                        
                                                <div class="resource-inner-label"> {{ $club->name }} </div>
                                            
                                                <div class="resource-img-container col-sm-6">
                                                        <img class="club-img" src="pics/{{ $club->pic->path }}"/>
                                                        <div class="resource-inner-label">Logo: {{ $club->pic->path }} </div>
                                                </div>
                                                <div class="resource-img-container col-sm-6">
                                                        <img class="club-img" src="pics/{{ $club->fanPic->path }}"/>
                                                        <div class="resource-inner-label">FanPic: {{ $club->fanPic->path }} </div>
                                                </div>
                                                    
                                                <div class="resource-inner-label">
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

