@extends('admin.layouts.master')

@section('title')
    Badges 
@stop

@section('header')
@stop


@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <h2>Add a badge</h2>
                            {!! Form::open(['action'=>'Admin\BadgeController@store']) !!}
                                    @include ('admin.badge.form',['submitText'=>'Create','defaultPath'=>'default.jpg'])
                            {!! Form::close() !!}

                            @include ('errors.list')
            </div>

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                    <h2> All badges </h2>
                    @foreach($badges as $badge)
                            <div class="col-sm-6">
                                            <div class="resource-unit">
                                                    <img src="{{ $badge->icon_path }}"/>
                                                        <div class="resource-inner-label">
                                                                {{ $badge->name }} 
                                                        </div>
                                                        <div class="resource-inner-label">
                                                                {{ $badge->description }}
                                                        </div>
                                                        <div class="resource-inner-label">
                                                                {{ $badge->icon_path }}
                                                        </div>
                                                        <div class="resource-inner-label">
                                                                    <button class="btn btn-primary"><a href="{{ route('admin.badge.edit',$badge->id)}}">Edit</a></button>
                                                                    <div>
                                                                            {!! Form::open(['action'=>['Admin\BadgeController@destroy',$badge->id],'method'=>'DELETE']) !!}
                                                                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                                                            {!! Form::close() !!}
                                                                    </div>
                                                        </div>
                                            </div>
                            </div>
                    @endforeach
            </div>


@stop

