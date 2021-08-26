@extends("layouts.users")

@section("css")
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection

@section("container")

  <form id="logout-form" action="{{ route('logout') }}" method="POST">
    <button type = "submit">ログアウト</button>
    @csrf
  </form>
    <div class = "d-flex justify-content-center">
        <a class = "m-4 text-center" href = "/supplies/create"><button>おさがり新規登録</button></a>
    </div>
    <div class = "d-flex align-items-center justify-content-end">{{ $supplies->appends(request()->query())->links() }}</div>   
    <div class = "d-flex justify-content-center">
        <h2 class = "m-4 text-center">登録したおさがり一覧</h2>
    </div>
    
    <!-- おさがりを一つずつ取り出す -->
        <ul class="list-group">
            @foreach($supplies as $supply)
                <li class="list-group-item d-flex justify-content-center">
                    <ul class="list-group list-group-horizontal">
                        <!-- 写真を表示 -->
                            <li class="list-group-item ">
                                @if ($supply->image_path1 == !null )
                                <img src = "{{"/storage/" .$supply->image_path1 }}" style = "width:50px; heigh:50px;</head> " > 
                                @endif
                            </li>
                        <!-- おさがり名を表示 -->
                            <li class="list-group-item" style ="width :100px; "><p class=" d-flex justify-content-center card-title m-3 w-100">{{$supply->item}}</p></li>
                        <!-- カテゴリー名を表示 -->
                            <li class="list-group-item">
                               {{$supply->category_id}}

                             
                            </li>
                        <!-- 投稿作成時間を表示 -->
                            <li class="list-group-item">
                                <p>登録日</p>
                                <div>{{ $supply['created_at']->format('Y/m/d') }}</div> 
                            </li>
                        <!-- 編集画面へと推移 -->
                            <li class="list-group-item">
                                <form action="/supplies/{{$supply->id}}/edit"  type = "hidden">
                                <button class= "btn-link" class="card-link">編集</button>
                                </form>
                            </li>
                    </ul>                    
                </li>
            @endforeach 
         </ul>
         <div class = "d-flex align-items-center justify-content-center">{{ $supplies->appends(request()->query())->links() }}</div> 

@endsection
   


  
  
  
  

