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

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>


    </head>

    <body class="backgroundcolor font">
                @yield('content')
    
        @yield('footer')
   

    <!-- javascript file inclusion-->
    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

     <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    </body>
</html>

