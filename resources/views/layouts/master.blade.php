<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link href="/src/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
  </head>
  <body>
    @include ('includes.header')

    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
