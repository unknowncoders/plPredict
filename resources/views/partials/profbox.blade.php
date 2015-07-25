<div>
            <br>
                @if ($user->club)
                    {{ $user->club->fanPic->path }}
                @else
                    {{ \App\Pic::find(1)->path }}
                @endif
            <br>
            <br>
                <a href="{{ url('/users',$user->username) }}">{{ $user->name }}</a>
            <br>
                (<a href="{{ url('/users',$user->username) }}">{{ $user->username }}</a>)
            <br>
            <br>
            Club: @if (isset($user->club)){{ $user->club->name }} @else - @endif
            <br>
            Points: {{ $user->score }}
            <br>
            Standing: {{ $user->rank }}
            <br>
            Badges: {{  $user->badges()->count() }}
</div>


