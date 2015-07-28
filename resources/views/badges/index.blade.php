@extends ('layouts.master')

@section ('title')

    Badges

@stop 

@section ('content')


    <div class="colorwhite" style=" margin-top: 100px;">

            <div>
                    {{ $badges->count() }} badges
            </div>
            <br>
            @if (isset($user))

                @foreach ($badges as $badge)

                   {{$badge->icon_path}} <br>
                   {{$badge->name}} <br>
                   {{$badge->description}} 

                    @if ($badge->users()->where('user_id',$user->id)->count()!=0)
                        <span style="background-color: green;">Won</span>
                    @endif

                    <br><br>

                @endforeach

                

            @else

                @foreach ($badges as $badge)

                   {{$badge->icon_path}} <br>
                   {{$badge->name}} <br>
                   {{$badge->description}} <br>

                @endforeach
            @endif
    </div>

@stop
