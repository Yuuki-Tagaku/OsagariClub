@extends("layouts.users")

@section("css")
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection
@section("container")
<h1 class ="text-center" >おさがり新規登録</h1>

<form action= "/supplies" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- おさがり名 -->
        <div class="mb-3 row">
            <label for="inputItem" class="col-sm-2 col-form-label">おさがり名</label>
            <div class="col-sm-10">
                <input type="text"  name = "item" class="form-control">
            </div>
        </div>
    
    <!-- サイズ入力 -->
        <div class="mb-3 row">
            <label for="inputSize" class="col-sm-2 col-form-label">サイズ</label>
            <div class="col-sm-10">
                <input type="text" name = "size" class="form-control">
            </div>
        </div>
    <!-- カテゴリ -->
        <label for="inpuVategory" class="col-sm-2 col-form-label">カテゴリー</label>
        <div class="form-check form-check-inline">
            @foreach($categories as $k => $val)
                <label class="categories{{$k}}"><input type="radio" name="category_id" value="{{$k}}">
                <label class="form-check-label" for="inlineRadio1">{{$val}}</label>
            @endforeach
        </div>
        <br>
    <!-- 使用年数 -->
        <div class="mb-3 row">
            <label for="inputYears_id" class="col-sm-2 col-form-label">使用年数</label>
            <div class="col-sm-10">
                <input type="text" name = "years_used" class="form-control">
            </div>
        </div>
    <!-- 使用していた性別入力 -->      
        使用していた性別
        <div class="form-check form-check-inline">
            @foreach($genders as $k => $val)
                <label class="$genders{{$k}}"><input type="radio" name="gender" value="{{$k}}">
                <label class="form-check-label" for="inlineRadio1">{{$val}}</label>
            @endforeach
        </div>
        <br>


    <!-- 状態入力 -->
        きれい度
        <div class="form-check form-check-inline">
            @foreach($conditions as $k => $val)
                <label class="conditions{{$k}}"><input type="radio" name="condition" value="{{$k}}">
                <label class="form-check-label" for="inlineRadio1">{{$val}}</label>
            @endforeach
        </div>
        <br>

    <!-- 写真登録 -->
        <h2>写真</h2><br>
        <input type="file" name="image_path1">
        <input type="file" name="image_path2">
        <input type="file" name="image_path3">
        <input type="file" name="image_path4">
    
    <!-- 備考入力 -->
        <h2>備考</h2><br>
        <input type ="text" name = "remarks"name = "remarks">
 <br>
    
    <button type = "submit">送信</button>
</form>

@endsection
