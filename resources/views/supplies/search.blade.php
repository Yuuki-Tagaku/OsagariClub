
@extends("layouts.users")

@section("css")
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection

@section("container")
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

  <!-- 綺麗度で検索 -->
    <div class = "category-wrapper">
      <h2>綺麗度</h2>
      <ul class="list-group list-group-horizontal">
        @foreach($conditions as $k =>$val)
          <li class="list-group-item">
            <form class="container-fluid">
              <div class="input-group">
                <input type="submit"  value="{{$val}}"  >
                <input type="hidden" name = "condition" class="form-control" name="search" value="{{$k}}"  >
              </div>
            </form>
          </li>
        @endforeach
      </ul>
    </div>

  <!-- カテゴリーを押したらカテゴリーで検索 -->
    <div class = "category-wrapper">
      <h2>カテゴリ</h2>
      <ul class="list-group list-group-horizontal">
        @foreach($categories as $k =>$val)
          <li class="list-group-item">
            <form class="container-fluid">
              <div class="input-group">
                <input type="submit"  value="{{$val}}"  >
                <input type="hidden" name = "category" class="form-control" name="search" value="{{$k}}"  >
              </div>
            </form>
          </li>
        @endforeach
      </ul>
    </div>

    <h2>検索結果</h2>

  <!-- 用品を一つずつ取り出す -->
    <div class="row row-cols-1 row-cols-md-2 g-4">
      @foreach ($supplies as $supply)
        <div class="col">
          <div class="card">
            <div class="card-body">
            <!-- 写真を表示 -->
              @if ($supply->image_path1 == !null )
                <img src = "{{"/storage/" .$supply->image_path1 }}" style = "width:50px; heigh:50px;</head> " > 
              @endif
            <!-- 用品のサイズを表示 -->
              <!-- もし用品のサイズカラムがなし以外の場合そのサイズを表示 -->
                @if($supply->size !=="なし")
                  <p class="card-text">{{$supply->item}}/{{$supply->size}}cm</p>
                @else
                  <!-- なしの場合表示しない -->
                  <p class="card-text">{{$supply->item}}</p>
                @endif

                
          
              <p class="card-text">{{$supply->category_id}}</p>
            <!-- コンディションカラムの値によって、表示する状態をケース文で繰り返す -->
              @foreach($conditions as $k =>$val)
                @switch($supply->condition)
                  @case($k)
                    <p class="card-text">{{$val}}</p>
                    @break
                  @endswitch
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection


