<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <text>@yield('text')</text>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
          <a href="/supplies"><button>おさがり登録</button></a>
          
        
          <button>おさがり交流中</button>
          <button>会員情報</button>
        </div>
      </div>
    </header>

    <div class = "center-block">
      <h1 class ="text-center" href = "/supplies" >おさがり検索</h1>
    </div>

    
<!-- 検索キーワードを入力 -->
    <nav class="navbar navbar-light bg-light">
      <form class="container-fluid">
        <div class="input-group">
          <input type="submit" value="@" class="btn btn-info">
          <input type="search"  class="form-control" name="search" placeholder="検索キーワード"  >
        </div>
      </form>
    </nav>


  <!-- カテゴリーを押したらカテゴリーで検索 -->
    <div class = "category-wrapper">
      <h2>カテゴリ</h2>
      <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit"  value="体育"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="0"  >
            </div>
          </form></li>
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit"  value="図工">
              <input type="hidden" name = "category" class="form-control" name="search" value="1"  >
            </div>
          </form></li>
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit"  value="音楽"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="2"  >
            </div>
          </form></li>
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit"  value="書写"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="3"  >
            </div>
          </form></li>
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
            <input type="submit"  value="クラブ"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="4"  >
            </div>
          </form></li>
      </ul>

      <ul class="list-group list-group-horizontal">
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
            <input type="submit"  value="国語"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="5"  >
            </div>
          </form></li>
        
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit"  value="算数"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="6"  >
            </div>
          </form></li>
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit"  value="理科"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="7"  >
            </div>
          </form></li>
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit"  value="社会"  >
              <input type="hidden" name = "category" class="form-control" name="search" value="8"  >
            </div>
          </form></li>
        <li class="list-group-item">
          <form class="container-fluid">
            <div class="input-group">
              <input type="submit" value="英語">
              <input type="hidden" name = "category" class="form-control" name="search" value="9"  >
            </div>
          </form></li>
      </ul>

    </div>

    <h2>検索結果</h2>


  <div class="row row-cols-1 row-cols-md-2 g-4">

    <!-- 用品を一つずつ取り出す -->
      @foreach ($supplies as $supply)
        <div class="col">
          <div class="card">
            <div class="card-body">
            @if ($supply->image_path1 == !null )
                <img src = "{{"/storage/" .$supply->image_path1 }}" style = "width:50px; heigh:50px;</head> " > 
              @endif
              <!-- もし用品のサイズカラムがなし以外の場合そのサイズを表示 -->
              @if($supply->size !=="なし")
              <p class="card-text">{{$supply->item}}/{{$supply->size}}cm</p>
              @else
              <!-- なしの場合表示しない -->
              <p class="card-text">{{$supply->item}}</p>
              @endif
              <p class="card-text"></p>
              <!-- コンディションカラムの値によって、表示する状態をケース文で -->
              @switch($supply->condition)
                @case(0)
                  <p class="card-text">新品・未使用</p>
                  @break
                @case(1)
                  <p class="card-text">未使用に近い</p>
                  @break
                @case(2)
                  <p class="card-text">目立った汚れなし</p>
                  @break
                @case(3)
                  <p class="card-text">やや汚れあり</p>
                  @break
                @case(4)
                  <p class="card-text">汚れあり</p>
                  @break
                @case(5)
                  <p class="card-text">全体的に状態が悪い</p>
                  @break
              @endswitch
              
              
            </div>
          </div>
        </div>
      @endforeach
    </div>

   


   

  </body>
</html>