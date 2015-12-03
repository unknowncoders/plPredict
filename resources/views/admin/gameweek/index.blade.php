@extends('admin.layouts.master')

@section('title')
    Gameweek 
@stop

@section('header')
@stop


@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">
                        <h2>Create a Gameweek </h2>
                            {!! Form::open(['action'=>'Admin\GameweekController@store']) !!}
                                <div class="form-group">
                                        {!!Form::label('month_id','Month:') !!}
                                        {!! Form::select('month_id',$months,null,['class'=>'form-control']) !!}
                                </div>
                                
                                <div class="form-group">
                                        {!! Form::submit("Add",['class'=>'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}

                            @include ('errors.list')
            </div>

            <div class="col-sm-12 col-md-8 col-md-offset-2">

                <h3>Running</h3>

                @foreach ($runningGameweeks as $rgw)
                    
                    <div>
                            <a href="{{ url('/admin/gameweek',$rgw->id) }}">Gameweek {{ $rgw->id }}</a><br>
                                    [{{ $rgw->overFixtureCnt }} over,<span style="color:red">{{ $rgw->pendingFixtureCnt }} pending</span>] out of {{ $rgw->fixtures->count() }} fixtures
                                
                                    {!! Form::open(['action'=>['Admin\GameweekController@compute',$rgw->id],'method'=>'POST']) !!}
                                            {!! Form::submit('Compute',['class'=>'btn btn-info']) !!}
                                    {!! Form::close() !!}

                                    @if ( $rgw->overFixtureCnt == $rgw->fixtures->count())
                                    {!! Form::open(['action'=>['Admin\GameweekController@complete',$rgw->id],'method'=>'POST']) !!}
                                            {!! Form::submit('Set as Complete',['class'=>'btn btn-info']) !!}
                                    {!! Form::close() !!}
                                    @endif
                    </div>

                @endforeach

                <h3>Incomplete</h3>

                @foreach ($upcomingGameweeks as $ugw)
                    
                    <div>
                            <a href="{{ url('/admin/gameweek',$ugw->id) }}">Gameweek {{ $ugw->id }}</a>
                    </div>

                @endforeach

                <h3>Complete</h3>

                @foreach ($completeGameweeks as $cgw)
                    
                    <div>
                            <a href="{{ url('/admin/gameweek',$cgw->id) }}">Gameweek {{ $cgw->id }}</a>
                                    {!! Form::open(['action'=>['Admin\GameweekController@compute',$cgw->id],'method'=>'POST']) !!}
                                            {!! Form::submit('Compute',['class'=>'btn btn-info']) !!}
                                    {!! Form::close() !!}
                    </div>

                @endforeach
            </div>


@stop

