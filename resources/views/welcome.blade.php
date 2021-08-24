<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" media="screen and (max-width: 480px)">
    </head>
    <body>
        <div class = "back_ground">
            <div class = "title_logo">
                <img src="public/images/osagariclub_logo_03.png" alt="">
            </div>
            <a href="{{ route('register') }}"><button class="" >{{ __('新規登録') }}</button></a><br>
                または<br>
            <a href="{{ route('login') }}"><button class="nav-link" >{{ __('ログイン') }}</button></a>
        </div>
    </body>
</html>
