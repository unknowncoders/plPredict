@extends('layouts.master')
@section('title')
    Login
@stop


@section('content')

<section id="page-top">
 <div class="jumbotron login font backgroundcolor">

       <div class="logintextcenter"> 
        <div class="loginpl">pl</div><div class ="loginpredict">predict</div>
        </br></br>
       <a href='/login/facebook' class="loginlink">Login with facebook</a>

       </div>
</div> 

</section>
<!--for temporary use-->

<section id="about" class="success colorwhite loginaboutcss">

  <div class="container">
        <div class= "row">
           <div class="col-lg-12 text-center">
               <br><br><br>
              <div style="color:#D9411E;font-size:5vw;">About</div><br><br>
           </div>
 
            <div class="col-lg-4 col-lg-offset-2" style="font-size:15px">
            <p>The main objective of this website is to predict the score line between the epl matches</p>
           </div>

          <div class="col-lg-4"style="font-size:15px">
            <p>The main objective of this website is to predict the score line between the epl matches</p>
          </div>
        </div>  
  </div>

</section>
     <form method="POST" action="/login">
             {!! csrf_field() !!}
         
             <div>
                 Email
                 <input type="email" name="email" value="{{ old('email') }}">
             </div>
         
             <div>
                 Password
                 <input type="password" name="password" id="password">
             </div>
         
             <div>
                 <input type="checkbox" name="remember"> Remember Me
             </div>
         
             <div>
                 <button type="submit">Login</button>
             </div>
         </form>

<div class="colorwhite">
             @if(count($errors)>0) 
              @foreach($errors->all() as $error) 
                    {{ $error }}
                @endforeach
            @endif
</div>
@stop
    
