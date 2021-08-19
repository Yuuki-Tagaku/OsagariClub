<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<h1 class ="text-center" >おさがり登録</h1>

<form action= "/supplies" method="POST" enctype="multipart/form-data">

    <!-- おさがり名 -->
        <div class="mb-3 row">
            <label for="inputItem" class="col-sm-2 col-form-label">おさがり名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control">
            </div>
        </div>
    
    <!-- サイズ入力 -->
        <div class="mb-3 row">
            <label for="inputSize" class="col-sm-2 col-form-label">サイズ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control">
            </div>
        </div>
    <!-- カテゴリ -->
        <form>
            <label for="inpuVategory" class="col-sm-2 col-form-label">カテゴリー</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="0">
                <label class="form-check-label" for="inlineRadio1" >体育</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"  value="1">
                <label class="form-check-label" for="inlineRadio2">図工</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="2">
                <label class="form-check-label" for="inlineRadio1">書写</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"  value="3">
                <label class="form-check-label" for="inlineRadio2">音楽</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="4">
                <label class="form-check-label" for="inlineRadio1">クラブ</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"  value="5">
                <label class="form-check-label" for="inlineRadio2">国語</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="6">
                <label class="form-check-label" for="inlineRadio1">算数</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"  value="7">
                <label class="form-check-label" for="inlineRadio2">理科</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="8">
                <label class="form-check-label" for="inlineRadio1">社会</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"  value="9">
                <label class="form-check-label" for="inlineRadio2">英語</label>
            </div>
        </form>
        <br>

        

    <!-- 使用年数 -->
        <div class="mb-3 row">
            <label for="inputYears_id" class="col-sm-2 col-form-label">使用年数</label>
            <div class="col-sm-10">
                <input type="text" class="form-control">
            </div>
        </div>
    <!-- 使用していた性別入力 -->
        <form>
            <label for="inpuCondition" class="col-sm-2 col-form-label">使用していた性別</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="0">
                <label class="form-check-label" for="inlineRadio1">男</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions"  value="1">
                <label class="form-check-label" for="inlineRadio2">女</label>
            </div>
        </form>
        <br>


    <!-- カテゴリ入力 -->
        <label for="inpuCondition" class="col-sm-2 col-form-label">状態</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0">
            <label class="form-check-label" for="inlineRadio1">新品・未使用</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
            <label class="form-check-label" for="inlineRadio2">未使用に近い</label>
        </div>
        <br><label for="inpuCondition" class="col-sm-2 col-form-label"></label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
            <label class="form-check-label" for="inlineRadio3">目立った汚れなし</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="3">
            <label class="form-check-label" for="inlineRadio4">やや汚れあり</label>
        </div>
        <br><label for="inpuCondition" class="col-sm-2 col-form-label"></label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="4">
            <label class="form-check-label" for="inlineRadio3">汚れあり</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="5">
            <label class="form-check-label" for="inlineRadio4">全体的に状態が悪い</label>
        </div>



    <!-- 写真登録 -->
        <h2>写真</h2><br>
        <input type="file" name="image_path1">
    
    <!-- 備考入力 -->
        <h2>備考</h2><br>
        <input type ="text" name = "remarks">

    <br>
    <button class="btn btn-success"> 確認する </button>
</form>

