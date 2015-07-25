<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
             <meta http-equiv="X-UA-Compatible" content="IE=edge">
             <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>@yield('title')</title>   
      <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/masterhelper.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>


    </head>

    <body class="backgroundcolor font">
            <div class="container">
            @include('partials.nav')
            
             @yield('content')
            </div>
    
        @yield('footer')
   

    <!-- javascript file inclusion-->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>


     <script src="js/bootstrap.min.js"></script>
     <!-- Plugin JavaScript -->
     <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
     <script src="js/freelancer.js"></script>

 </body>
</html>

