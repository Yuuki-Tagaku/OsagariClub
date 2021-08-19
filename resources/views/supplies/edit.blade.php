<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

編集画面

<div class = "m-5">
ID：{{$supply->id}}<br>
ユーザーID：{{$supply->user_id}}<br>
カテゴリーID；{{$supply->category_id}}<br>
商品名：{{$supply->item}}<br>
サイズ：{{$supply->size}}<br>
コンディション：{{$supply->condition}}<br>
使用年数：{{$supply->years_used}}<br>
性別：{{$supply->gender}}<br>
備考：{{$supply->remarks}}<br>
写真：{{$supply->image_path1}}<br>

</div>
<form method="POST" action="/supplies/{{ $supply->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3 row">
        <label for="inputItem" class="col-sm-2 col-form-label">おさがり名</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

   

    <div class="mb-3 row">
        <label for="inputSize" class="col-sm-2 col-form-label">サイズ</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputCategory_id" class="col-sm-2 col-form-label">カテゴリ</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="inputYears_id" class="col-sm-2 col-form-label">使用年数</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
        </div>
    </div>

    <label for="inpuCondition" class="col-sm-2 col-form-label">使用していた性別</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" value="">
        <label class="form-check-label" for="inlineRadio1">男</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions"  value="">
        <label class="form-check-label" for="inlineRadio2">女</label>
    </div><br>



    <label for="inpuCondition" class="col-sm-2 col-form-label">状態</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
        <label class="form-check-label" for="inlineRadio1">新品・未使用</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio2">未使用に近い</label>
    </div>
    <br><label for="inpuCondition" class="col-sm-2 col-form-label"></label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio3">目立った汚れなし</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio4">やや汚れあり</label>
    </div>
    <br><label for="inpuCondition" class="col-sm-2 col-form-label"></label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio3">汚れあり</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
        <label class="form-check-label" for="inlineRadio4">全体的に状態が悪い</label>
    </div>


    <h2>写真</h2><br>
    <input type="file" name="image_path1">
    
    <h2>備考</h2><br>
    <input type ="text" name = "remarks">

        <input type="submit">
</form> 

<a  href="confirmation">
    <button>削除</button>
</a>


