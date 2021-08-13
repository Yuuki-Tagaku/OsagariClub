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
          <img src="/">
        </div>
        <div class="header-container-menu">
          <button>おさがり<br>登録</button>
          <button>おさがり<br>交渉中</button>
          <button>会員<br>情報</button>
        </div>
      </div>
    </header>
    @yield('container')
  </body>
</html>