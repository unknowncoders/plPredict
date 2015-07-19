@extends('layouts.master')
@section('title')
    Login
@stop

@section('content')

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

             @if(count($errors)>0) 
              @foreach($errors->all() as $error) 
                    {{ $error }}
                @endforeach
            @endif

@stop
    
