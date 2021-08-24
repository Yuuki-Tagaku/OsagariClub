
@extends("layouts.users")

@section("css")
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection

@section("container")

  <div class = "center-block">
    <p class ="text-center" >登録が完了しました</p>
  </div>


  <div class="container">
    <div class="d-flex align-items-center justify-content-center" style="height:300px;">
      <p class ="text-center" >登録が完了しました</p>
      <a class = "m-4 text-center" href = "/supplies"><button>戻る</button></a>
    </div>
  </div>
   

@endsection