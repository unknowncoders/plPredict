
<nav class="navbar-default navbar-fixed-top backgroundcolor">
<br>
<div  class="container">

@if($logged_in)


       <ul class= "nav nav-tabs navbar-left " style="margin-bottom:10px">
         <li role="presentation" ><a href="/predict" class="colorwhite"><strong>Predict</strong></a></li>
         <li role="presentation" ><a href="/badges"class ="colorwhite"><strong>Badges</strong></a></li>
         <li role="presentation" ><a href="/standings"class ="colorwhite"><strong>Standings</strong></a></li>
       </ul>

     
         <ul class= "nav nav-tabs navbar-right ">
    @if($authUser->username)
         <li ><p class="colorwhite"><i class="fa fa-user-secret"></i>&nbsp <a href="{{ url('/users',$authUser->username) }}" class="registrationlink">{{ $authUser->name }}</a>&nbsp &nbsp</p></li>
    @endif
  
     <li>         
                 <div class="dropdown">
                     <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <i class="fa fa-futbol-o"></i>
                 <span class="caret"></span>
                     </button>
                 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li ><a href="/faq">FAQ</a></li>
                   <li role="separator" class="divider"></li>  
                   <li ><a href="/rules">Rules</a></li>
                   <li role="separator" class="divider"></li>  
                   <li><a href="/settings">Settings</a></li>
                   <li role="separator" class="divider"></li>  
                   <li><a href="/logout">Logout</a></li>
              </ul>
              </div>
           </li>
           
        </ul>
@elseif ($onLogin)

      <ul class="nav nav-tabs navbar-right">

        <li role="presentation" class="page-scroll"><a href="#page-top" class="colorwhite"><strong>Login</strong></a></li>
        <li role="presentation" class="page-scroll" ><a href="#about"class ="colorwhite"><strong>About</strong></a></li>
     
      </ul>

@else 
      <ul class="nav nav-tabs navbar-right">

        <li role="presentation" class="page-scroll"><a href="/login#page-top" class="colorwhite"><strong>Login</strong></a></li>
        <li role="presentation" class="page-scroll" ><a href="/login#about"class ="colorwhite"><strong>About</strong></a></li>
     
      </ul>
       <!-- using only login with fb no sign up method-->
        <!--a href="/login">Sign Up</a-->

@endif 

</div>
</nav>

