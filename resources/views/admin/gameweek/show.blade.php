@extends ('admin.layouts.master')

@section ('title')
    Gameweek {{ $gameweek->id }}
@stop

@section('content')

            <div class="col-sm-12 col-md-8 col-md-offset-2">

                <h3>Gameweek {{ $gameweek->id }} [{{$gameweek->fxtCnt}} fixtures]</h3>

                <div>
                        <h4>Over fixtures [{{$gameweek->overFixtures->count()}}]</h4>

                        @foreach ($gameweek->overFixtures as $ofxt)

                            <div>
                                    {{ $ofxt->homeClub->name }} : {{ $ofxt->home_score }} &nbsp vs &nbsp  {{ $ofxt->away_score }}: {{ $ofxt->awayClub->name }}  <br>
                                    {{ $ofxt->kickoff }}
                                    <a href="{!! route('admin.fixture.edit',$ofxt->id) !!}">Edit</a>
                                    {!! Form::open(['action'=>['Admin\FixtureController@destroy',$ofxt->id],'method'=>'DELETE']) !!}
                                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                    {!! Form::open(['action'=>['Admin\FixtureController@compute',$ofxt->id],'method'=>'POST']) !!}
                                            {!! Form::submit('Compute',['class'=>'btn btn-info']) !!}
                                    {!! Form::close() !!}
                            </div>


                        @endforeach
                </div>

                <div>
                        <h4>Pending fixtures [{{$gameweek->pendingFixtures->count()}}]</h4>

                        @foreach ($gameweek->pendingFixtures as $pfxt)

                            <div>
                                    {{ $pfxt->homeClub->name }} &nbsp vs &nbsp {{ $pfxt->awayClub->name }} <br>
                                    {{ $pfxt->kickoff }}
                                    <a href="{!! route('admin.fixture.edit',$pfxt->id) !!}">Edit</a>
                                    {!! Form::open(['action'=>['Admin\FixtureController@destroy',$pfxt->id],'method'=>'DELETE']) !!}
                                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                    {!! Form::open(['action'=>['Admin\FixtureController@compute',$pfxt->id],'method'=>'POST']) !!}
                                            {!! Form::submit('Compute',['class'=>'btn btn-info']) !!}
                                    {!! Form::close() !!}
                            </div>

                        @endforeach
                </div>

                <div>
                        <h4>Upcoming fixtures [{{$gameweek->upcomingFixtures->count()}}]</h4>

                        @foreach ($gameweek->upcomingFixtures as $ufxt)

                            <div>
                                    {{ $ufxt->homeClub->name }} &nbsp vs &nbsp {{ $ufxt->awayClub->name }} <br>
                                    {{ $ufxt->kickoff }}
                                    <a href="{!! route('admin.fixture.edit',$ufxt->id) !!}">Edit</a>
                                    {!! Form::open(['action'=>['Admin\FixtureController@destroy',$ufxt->id],'method'=>'DELETE']) !!}
                                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                            </div>

                        @endforeach
                </div>

                        <h4>Add Fixture</h4>

                            {!! Form::open(['action'=>'Admin\FixtureController@store']) !!}
                                    @include ('admin.fixture.form',['submitText'=>'Create','gameweekId'=>$gameweek->id])
                            {!! Form::close() !!}

                            @include ('errors.list')
            </div>

@stop
