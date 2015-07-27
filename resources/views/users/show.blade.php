@extends('layouts.master')

@section('title')
    {{$user->username}}'s profile
@stop

@section('content')
    @include('partials.profbox')

            <div style="margin-top:120px;">
                    <a href="/users/{{$user->username}}">Predictions</a>
                    <a href="/users/{{$user->username}}/badges">Badges</a>
            </div>

            <div style="margin-top:150px;">

                <span class="colorwhite">
                    @if ($gameweekInFocus->id > 1)
                        <a href="users/{{$user->username}}/gameweek/{{$gameweekInFocus->id}}">Gameweek {!!$gameweekInFocus->id-1!!}</a>
                    @endif

                    @if ($gameweekInFocus->id < $lastFixture->gameweek->id )
                        <a href="users/{{$user->username}}/gameweek/{{$gameweekInFocus->id}}">Gameweek {!!$gameweekInFocus->id+1!!}</a>
                    @endif
                </span>

            
                    {!! Form::open(['action'=>['UserController@showGameweek',$user->username]]) !!}

                            <select name="gwid">
                                @foreach ($gameweeks as $gameweek)
                                    <option value="{{ $gameweek->id }}">Gameweek {{$gameweek->id}}</option>
                                @endforeach


                            </select>

                                {!! Form::submit('Done',[]) !!}
                    {!! Form::close() !!}
            </div>
                    
                            <div class="colorwhite" style="margin-top:200px;">
                                    @foreach ($gameweekInFocus->fixtures as $fixture)
                                        <div>
                                                {{ $fixture->homeClub->name }}: {{ $fixture->home_score }} <br>
                                                {{ $fixture->awayClub->name }}: {{ $fixture->away_score }}

                                        <?php $pred = $fixture->predictions()->where('user_id',$user->id)->first(); ?>

                                            @if ($pred)
                                                {{ $pred->home_score }} <br>
                                                {{ $pred->away_score }} <br>
                                                {{ $pred->score() }}
                                            @else
                                                    - <br> -
                                            @endif
                                        </div>

                                    @endforeach
                            </div>

                          
                            <div class="colorwhite" style="margin-top:300px;">
                                    @foreach ($gameweeks as $gameweek)
                                        <strong>
                                            <a href="/users/{{$user->username}}/gameweek/{{$gameweek->id}}">Gameweek {{$gameweek->id}}</a>
                                            : {{ $gameweek->predictors()->where('user_id',$user->id)->first()->pivot->score }}
              
                                    </strong> <br>
                                    @endforeach

                                    {!! $gameweeks->render() !!}
                            </div>
@stop
