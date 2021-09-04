@extends("layouts.users")

@section('title', 'おさがり検索')

@section('js')
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection


@section("container")
  <!-- フリー検索 -->
  <div class="title-Container">
    <h3 class="search-title">キーワードからおさがりを検索します。</h3>
    <!-- 修正箇所：デザイン優先のためにtitleと検索窓をdivでひとまとめにしました。 -->
    <form class="container-fluid">
      <div class="search-group">
          <input type="text" class="search-word"  name="search_word" placeholder="検索キーワード">
          <button type="submit" class="search-btn"></button>
      </div>
    </form>
  </div>
  <!-- 検索ワードの入力箇所に綺麗度や性別など様々な情報を入力して検索するため
        ここにあった綺麗度などのボタンは撤去してあります。 -->

  <!-- カテゴリーを押したらカテゴリーで検索 -->
  <div class="category-Group search-Category-Group">
    <h3 class="search-title">キーワードからおさがりを検索します。</h3>
    <div class="category-Group-Button">
      <div class="search-Category-Button">
        <form>
          @foreach($categories as $category)
            @if(!empty($keycategory))
              <button type="submit" name="search_category" value="{{$category['id']}}"  class="search-Category {{$keycategory == $category['id']? 'select-Category' : 'category'}}">{{$category['category']}}</button>
            @else
              <button type="submit" name="search_category" value="{{$category['id']}}" class="search-Category category">{{$category['category']}}</button>
            @endif
          @endforeach
        </form>
      </div>
    </div>
  </div>

    <h3 class="search-title">検索結果</h3>
    {{$supplies->appends($param)->links()}}

  <!-- 用品を一つずつ取り出す -->
    <div class="search-Result">
      @if(isset($supplies))
        @foreach ($supplies as $supply)
          <div class="result-Supply-Container">
          <!-- 写真を表示(修正箇所：画像は１枚は必須なのでif文はいらない) -->
            <img src = "{{ asset('storage/images/supply/' . $supply->image_path1) }}">
          <!-- 用品のサイズを表示(修正箇所：サイズも必須なのでif文はいらない) -->
            <p>{{$supply->item}}</p>
            <p>{{$supply->size}}</p>
          <!-- コンディションカラムの値によって、表示する状態をケース文で繰り返す -->
            @foreach(config('const')['condition'] as $k => $val)
              @if($supply->condition == $k)
                <label class="condition{{$k}}"><span class="color{{$k}}">{{$val}}</span></label>
              @endif
            @endforeach
          </div>
        @endforeach
      @else
        <p class="no-supply">一致するおさがりはありません</p>
      @endif
    </div>
    <div class="pagination-area">
      {{$supplies->appends($param)->links()}}
    </div>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('js/supplyForm.js') }}"></script>
@endsection


