<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>   
      <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro">
        <link rel="stylesheet" href="{{ URL::asset('css/admin/adminhelper.css') }}">
                @yield('header')
    </head>

    <body>
                <div id="container">
                        @include('admin.partials.horizontal_nav')
                        <div id="page-wrapper" class="flexbox">
                                    <div class="row">
                                            <div class="col-equal col-sm-3">
                                                @include('admin.partials.vertical_nav')
                                            </div>

                                            <div class="col-equal col-sm-9" id="page-content">
                                                @yield('content')
                                            </div>
                                    </div>
                        </div>
                </div>

        <!-- Scripts --!>
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

        @yield('footer')
    </body>
</html>

