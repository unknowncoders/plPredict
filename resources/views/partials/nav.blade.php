
@if($logged_in)

   <a href="/predict">Predict</a> 
   <a href="/badges">Badges</a> 
   <a href="/standings">Standings</a> 

    @if($user->username)
   <a href="{{ url('/users',$user->username) }}">{{ $user->name }}</a>
    @endif

    <a href="/faq">FAQ</a>
    <a href="/rules">Rules</a>
    <a href="/settings">Settings</a>
    <a href="/logout">Logout</a>

@else

        <a href="/login">Login</a>
        <a href="/login">Sign Up</a>

@endif 
