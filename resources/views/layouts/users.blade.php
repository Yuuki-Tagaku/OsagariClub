<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')

    @yield('js')
  </head>
  <body>
    <header>
      <div class="header-container">
        <div class="header-container-logo">
          <img src="">
        </div>
        <div class="header-container-menu">
          <button></button>
          <button></button>
          <button></button>
        </div>
      </div>
    </header>
    @yield('container')
  </body>
</html>