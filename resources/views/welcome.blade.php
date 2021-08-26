<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OsagariClub</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" media="screen and (max-width: 480px)">
    </head>
    <body>
        <div class = "container">
            <div class = "d-flex align-items-center justify-content-center" style="height: 100vh;">
                <div>
                    <a href="{{ route('register') }}"><button >{{ __('新規登録') }}</button></a>
                        <p class = "text-center m-1">または</p>
                    <a href="{{ route('login') }}"><button  >{{ __('ログイン') }}</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
