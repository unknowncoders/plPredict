<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
              <title>@yield('title')</title>   
    </head>

    <body>
            @include('partials.nav')
            <div class="container">
                    @yield('content')
            </div>
    
        @yield('footer')
    </body>
</html>

