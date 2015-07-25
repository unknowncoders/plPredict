
<nav class="navbar-default navbar-fixed-top backgroundcolor">
<br>
<div  class="container">

@if($logged_in)

   <a href="/predict">Predict</a> 
   <a href="/badges">Badges</a> 
   <a href="/standings">Standings</a> 

    @if($authUser->username)
   <a href="{{ url('/users',$authUser->username) }}">{{ $authUser->name }}</a>
    @endif

    <a href="/faq">FAQ</a>
    <a href="/rules">Rules</a>
    <a href="/settings">Settings</a>
    <a href="/logout">Logout</a>

@else

        <ul class="nav nav-tabs navbar-right">

        <li role="presentation" class="page-scroll"><a href="#page-top" class="colorwhite"><strong>Login</strong></a></li>
        <li role="presentation" class="page-scroll" ><a href="#about"class ="colorwhite"><strong>About</strong></a></li>
       
         </ul>
       <!-- using only login with fb no sign up method-->
        <!--a href="/login">Sign Up</a-->

@endif 

</div>
</nav>

