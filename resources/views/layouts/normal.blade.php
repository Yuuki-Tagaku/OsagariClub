<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>@yield('title')</title>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" media="screen and (max-width: 480px)">
    @yield('js')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>
  <body class="user-Create-Container">
    @yield('container')
  </body>
</html>