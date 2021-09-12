
@extends("layouts.users")

@section("css")
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection



@section("container")



  <form id="logout-form" action="{{ route('logout') }}" method="POST">
    <button type = "submit">ログアウト</button>
    @csrf
  </form>
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
    <div class = "category-wrapper" >
      <h5 class = "mt-3">綺麗度</h5>

      <div class="row row-cols-2">
        @foreach($conditions as $k =>$val)
          <div class="col">
            <form class="container-fluid">
              <input type="submit"  value="{{$val}}"  >
              <input type="hidden" name = "condition" class="form-control" name="search" value="{{$k}}"  >
            </form>
          </div>
        @endforeach
      </div>
    </div>

  <!-- カテゴリーを押したらカテゴリーで検索 -->
    <div class = "category-wrapper">
      <h5 class = "mt-5">カテゴリ</h5>


      <div class="container">
        <div class="row row-cols-5">
          @foreach($categories as $category)
            <div class="col">
              <form class="container-fluid">
                <div class="input-group">
                  <input type="submit" value= "{{$category ['category']}}">

                  <input type="hidden" name="category" value="{{$category['id']}}">
                </div>
              </form>
            </div>
          @endforeach
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-auto mr-auto">検索結果</div>
      <div class="col-auto ">{{ $supplies->appends(request()->query())->links() }}</div>
    </div>
  <!-- 用品を一つずつ取り出す -->

    <div class="row row-cols-2 row-cols-md-2 g-4">
      @foreach ($supplies as $supply)
        <div class="col">
          <div class="card">
            <div class="card-body ">
            <!-- 写真を表示 -->
              @if ($supply->image_path1 == !null )
                <div class = "m-auto d-flex align-items-center justify-content-center" >
                  <img src = "{{"/storage/" .$supply->image_path1 }}" style = "width:50px; heigh:50px;</head> " > 
                </div>
                @endif
            <!-- 用品のサイズを表示 -->
              <!-- もし用品のサイズカラムがなし以外の場合そのサイズを表示 -->
                @if($supply->size !=="なし")
                  <p class="card-text">{{$supply->item}}/{{$supply->size}}cm</p>
                @else
                  <!-- なしの場合表示しない -->
                  <p class="card-text">{{$supply->item}}</p>
                @endif
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
    <div class = "d-flex align-items-center justify-content-center">{{ $supplies->appends(request()->query())->links() }}</div>
@endsection





