<div>
            <br>
                @if ($profUser->club)
                    {{ $profUser->club->fanPic->path }}
                @else
                    {{ \App\Pic::find(1)->path }}
                @endif
            <br>
            <br>
                <a href="{{ url('/users',$profUser->username) }}">{{ $profUser->name }}</a>
            <br>
                (<a href="{{ url('/users',$profUser->username) }}">{{ $profUser->username }}</a>)
            <br>
            <br>
            Club: @if (isset($profUser->club)){{ $profUser->club->name }} @else - @endif
            <br>
            Points: {{ $profUser->score }}
            <br>
            Standing: {{ $profUser->rank }}
            <br>
            Badges: {{  $profUser->badges()->count() }}
</div>


