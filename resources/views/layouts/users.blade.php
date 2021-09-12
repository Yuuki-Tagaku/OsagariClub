<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>@yield('title')</title>
    

    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" media="screen and (max-width: 480px)">
    @yield('css')

    @yield('js')
  </head>
  <body>
    <header>
      <div class="header-container">
        <div class="header-container-logo">

          <img src="{{ asset('images/Logo-Title.png') }}">
        </div>
        <div class="header-container-menu">
          <img src="{{ asset('images/supply-create.png') }}">
          <img src="{{ asset('images/chat.png') }}">
          <img src="{{ asset('images/user-info.png') }}">
        <a href="/supplies">登録画面へ</a>
        </div>
      </div>
    </header>
    @yield('container')
  </body>
</html>