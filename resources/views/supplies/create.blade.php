@extends('layouts.users')

@section('title', 'おさがり情報編集')

@section('js')
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

@section('container')
  <div class="title-Container">
    <h2>おさがり情報を編集します。</h2>
  </div>
  <div class="supply-Edit-Container">
    <form action="{{ route('supply.create') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-Group">
          <span>おさがり名＊</span>
          <input type="text" name="item">
        </div>
        <div class="category-Group">
          <span>カテゴリ＊</span>
            <div class="category-Group-Button">
              @foreach($categories as $category)
                <label><input type="radio" name="category_id" value="{{$category['id']}}"><span class="category">{{$category['category']}}</span></label>
              @endforeach
            </div>
        </div>
        <div class="form-Group">
          <span>サイズ＊</span>
          <input type="text" name="size">
        </div>
        <div class="form-Group">
          <span>使用年数＊</span>
          <input type="text" name="years_used">
        </div>
        <div class="form-Group gender-Group">
          <span>使用していた性別＊</span>
            @foreach(config('const')['gender'] as $k => $val)
              <label><span class="gender"></span><input type="radio" name="gender" value="{{$k}}">{{$val}}</label>
            @endforeach
        </div>
        <div class="condition-Group">
          きれい度
          <div class="condition-Group-Choice">
              @foreach(config('const')['condition'] as $k => $val)
                  <label class="condition{{$k}}"><span class="condition"></span><input type="radio" name="condition" value="{{$k}}"><span class="color{{$k}}">{{$val}}</span></label>
              @endforeach
          </div>
        </div>
        おさがりの写真
        <div class="image-Group">
          @for($n = 1; $n <= 4; $n++)
            <label>
              <div class="image{{$n}}">
                <img id="img{{$n}}">
                <span class="label{{$n}}"><label>写真アップロード{{$n == 1 ? '必須' : ''}}<input type="file" name="image_path{{$n}}" class="imgFile{{$n}}"></label></span>
              </div>
            </label>
          @endfor
        </div>
        <div class="supply-Remarks-Container">
          備考
          <textarea name="remarks" rows="5" cols="44%" class="remarks-Textarea"></textarea>
        </div>
      <div class="btn-Group">
        <input type="submit" name="create" value="登録する">
      </div>
    </form>
  </div>
  <script src="{{ asset('js/supplyForm.js') }}"></script>
@endsection