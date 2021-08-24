@extends("layouts.users")

@section('title', 'おさがり新規登録')

@section('js')
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

@section("container")
    <div class="title-Container">
        <h2>おさがり情報を登録します。</h2>
    </div>
    <div class="supply-create-Container">
        <form action= "/supplies" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- おさがり名 -->
                <div class="form-Group">
                    <span>おさがり名＊</span>
                    <input type="text" name="item" value="">
                </div>
            <!-- カテゴリー -->
                <div class="category-Group">
                    <span>カテゴリ＊</span>
                    <div class="category-Group-Button">
                        @foreach($categories as $category)
                            <label class=""><input type="radio" name="category_id" value= "{{$category['id']}}" >
                            <label class="form-check-label" for="inlineRadio1">{{$category->category}}</label>
                        @endforeach
                    </div>
                </div>
            <!-- サイズ入力 -->
                <div class="form-Group">
                    <span>サイズ＊</span>
                    <input type="text" name="size" value="">
                </div>

            <!-- 使用年数 -->
                <div class="form-Group">
                    <span>使用年数＊</span>
                    <input type="text" name="years_used" value="">
                </div>

            <!-- 使用していた性別 -->
                <div class="form-Group gender-Group">
                    <span>使用していた性別＊</span>
                    @foreach($genders as $k => $val)
                        <label class="$genders{{$k}}"><input type="radio" name="gender" value="{{$k}}">
                        <label class="form-check-label" for="inlineRadio1">{{$val}}</label>
                    @endforeach
                </div> 
            <!-- 状態入力 -->           
                <div class="condition-Group">
                    きれい度
                    <div class="condition-Group-Choice">
                        @foreach($conditions as $k => $val)
                            <label class="conditions{{$k}}"><input type="radio" name="condition" value="{{$k}}">
                            <label class="form-check-label" for="inlineRadio1">{{$val}}</label>
                        @endforeach
                    </div>
                </div>

            <!-- 写真登録 -->
                おさがりの写真
                <div class="image-Group">
                    @for($i =1; $i<=4; $i++)
                        <div class="image{{$i}}">
                            <label>写真をアップロード<input type="file" name="image_path{{$i}}" class="imgFile{{$i}}"></label>
                        </div>    
                    @endfor
                </di>
            <!-- 備考入力 -->
                <div class="supply-Remarks-Container">
                    備考
                    <textarea name="remarks" rows="5" cols="46%"></textarea>
                </div>
            <!-- 確認ボタン -->
            <div class="btn-Group">
                <button type = "submit">確認する</button>   
            </div>
        </form>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/supplyForm.js') }}"></script>
@endsection
