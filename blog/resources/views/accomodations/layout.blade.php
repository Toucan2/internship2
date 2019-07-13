<!doctype html>
<html>
    <head>
        <title>@yield('title')</title>
    </head>

    <body>
        <h1>@yield('header')</h1>
        <br><br>

        @yield('content')

        @yield('footer')
    </body>
</html>