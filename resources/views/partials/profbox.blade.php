<div>
            <br>
            {{ $profUser->club->fanPic->path }}
            <br>
            <br>
                <a href="{{ url('/users',$profUser->username) }}">{{ $profUser->name }}</a>
            <br>
                (<a href="{{ url('/users',$profUser->username) }}">{{ $profUser->username }}</a>)
            <br>
            <br>
            Club: {{ $profUser->club->name }}
            <br>
            Points: {{ $profUser->score }}
            <br>
            Standing: {{ $profUser->rank }}
            <br>
            Badges: {{  $profUser->badges()->count() }}
</div>


