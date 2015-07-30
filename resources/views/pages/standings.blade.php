@extends ('layouts.master')

@section ('title')

@stop

@section ('content')
    <div style="background-color:white; margin-top: 200px">
            <ul class="nav nav-tabs">
                <li class="{{$activeTabs[0]}}"><a data-toggle="tab" href="#overall" class="showtabs">Overall</a></li>
                <li class="{{$activeTabs[1]}}"><a data-toggle="tab" href="#monthly" class="showtabs">Monthly</a></li>
                <li class="{{$activeTabs[2]}}"><a data-toggle="tab" href="#weekly" class="showtabs">Weekly</a></li>
            </ul>

            <div class="tab-content">

                    <div id="overall" class="tab-pane {{$activeTabs[0]}}">

                        <strong> Overall </strong> <br>

                        @if ($user)
                            
                            {{ $user->rank }}: <a href="/users/{{ $user->username }}">{{ $user->username }} </a> | {{ $user->score }}<br><br>

                        @endif

                        @foreach ($users  as $userInst)

                            {{ $userInst->rank }}: <a href="/users/{{ $userInst->username }}">{{ $userInst->username }} </a> | {{ $userInst->score }}<br>
                        
                        @endforeach 


                    </div>

                    <div id="monthly" class="tab-pane {{$activeTabs[1]}}">

                        @foreach ($months as $month)

                            <a href="/standings/month/{{$month->id}}">{{ $month->name }} </a>

                        @endforeach

                        <strong> {{$month->name }} </strong><br>
                        @if ($user)
                            
                            <?php $monthUser =$user->months()->where('month_id',$month->id)->first(); ?> 
                            @if ($monthUser){{ $monthUser->pivot->rank }} @else - @endif :
                                <a href="/users/{{ $user->username }}">{{ $user->username }} </a> | 
                                @if ($monthUser) 
                                    {{ $user->gameweeks()->where('month_id',$month->id)->sum('score') }}
                                @else - @endif

                            <br><br>

                        @endif

                        @foreach ($monthUsers  as $userInst)

                            <?php $monthUser =$userInst->months()->where('month_id',$month->id)->first(); ?> 
                            {{ $monthUser->pivot->rank }}: <a href="/users/{{ $userInst->username }}">{{ $userInst->username }} </a> | {{ $userInst->gameweeks()->where('month_id',$month->id)->sum('score') }}<br>
                        
                        @endforeach 
                    </div>

                    <div id="weekly" class="tab-pane {{$activeTabs[2]}}">

                        @foreach ($gameweeks as $gameweekInst)

                            <a href="/standings/gameweek/{{$gameweekInst->id}}">Gameweek {{ $gameweekInst->id }} </a>

                        @endforeach

                            <strong> Gameweek {{ $gameweek->id }} </strong><br>

                        @if ($user)
                            
                            <?php $gameweekUser =$user->gameweeks()->where('gameweek_id',$gameweek->id)->first(); ?> 

                            @if ($gameweekUser)
                                    {{ $gameweekUser->pivot->rank }} 
                            @else - @endif :
                                    <a href="/users/{{ $user->username }}">{{ $user->username }} </a> | 

                            @if ($gameweekUser)

                            {{ $gameweekUser->pivot->score }}
                            
                            @else 
                                    -

                            @endif

                            <br><br>

                        @endif

                        @foreach ($gameweekUsers  as $userInst)

                            <?php $gameweekUser =$userInst->gameweeks()->where('gameweek_id',$gameweek->id)->first(); ?> 

                            {{ $gameweekUser->pivot->rank }}: <a href="/users/{{ $userInst->username }}">{{ $userInst->username }} </a> | {{ $gameweekUser->pivot->score }}<br>
                        
                        @endforeach 
                    </div>
            </div>
    </div>

@stop


