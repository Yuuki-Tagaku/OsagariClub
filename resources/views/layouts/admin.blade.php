<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/admin-Stylesheet.css') }}">
    @yield('css')

    @yield('js')
  </head>
  <body>
    <header>
      <div class="admin-Header-Container">
        <li>
          <ol>ユーザー管理</ol>
          <ol>カテゴリー管理</ol>
          <ol>おさがり管理</ol>
          <ol>チャット管理</ol>
          <ol>ログアウト</ol>
          <ol></ol>
          <ol></ol>
        </li>
      </div>
    </header>
    @yield('container')
  </body>
</html>