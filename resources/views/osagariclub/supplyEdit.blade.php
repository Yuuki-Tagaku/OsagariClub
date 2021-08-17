@extends('layouts.users')

@section('title', 'おさがり情報編集')

@section('container')
  <div class="title-Container">
    <h2>おさがり情報編集</h2>
  </div>
  <div class="supply-Edit-Container">
    <form action="{{route('supply.branch')}}" method="post" enctype="multipart/form-data">
      @csrf
      <dl>
        <div class="form-Group">
          <dt>おさがり名</dt>
          <dd><input type="text" name="item" value="{{$search_supply['item']}}"><span>必須</span></dd>
        </div>
        <div class="form-Group">
          <dt>カテゴリー</dt>
          <dd>
            <select name="category_id">
              <option disabled selected value>選択してください</option>
              @foreach($categories as $category)
                <option value="{{$category['id']}}" {{$category['id'] == $search_supply['category_id'] ? 'selected' : ''}}>{{$category['category']}}</option>
              @endforeach
            </select>
            <span>必須</span>
          </dd>
        </div>
        <div class="form-Group">
          <dt>サイズ</dt>
          <dd><input type="text" name="size" value="{{$search_supply['size']}}"><span>必須</span></dd>
        </div>
        <div class="form-Group">
          <dt>使用年数</dt>
          <dd><input type="text" name="years_used" value="{{$search_supply['years_used']}}"><span>必須</span></dd>
        </div>
        <div class="form-Group gender-Group">
          <dt>使用していた性別</dt>
          <dd>
            @foreach(config('const')['gender'] as $k => $val)
              <input type="radio" name="gender" value="{{$k}}" {{$k == $search_supply['gender'] ? 'checked' : ''}}>{{$val}}
            @endforeach
          <span>必須</span>
          </dd>
        </div>
        <div class="form-Group condition-Group">
          <dt>きれい度</dt>
          <dd>
            @foreach(config('const')['condition'] as $k => $val)
              <ul>
                <ol><input type="radio" name="condition" value="{{$k}}" {{$k == $search_supply['condition'] ? 'checked' : ''}}>{{$val}}</ol>
              </ul>
            @endforeach
          <span>必須</span>
          </dd>
        </div>
        <div class="form-Group image-Group">
          <dt>写真</dt>
          <dd>
            <input type="file" name="image_path1">
            <input type="file" name="image_path2">
            <input type="file" name="image_path3">
            <input type="file" name="image_path4">
          <span>１枚は必須</span>
          </dd>
        </div>
        <div class="supply-Remarks-Container">
          <dt>備考欄</dt>
          <dd><textarea name="remarks" rows="4" cols="34">{{$search_supply['remarks']}}</textarea></dd>
        </div>
        <input type="hidden" name="id" value="{{$search_supply['id']}}">
      </dl>
      <div class="btn-Group">
        <input type="submit" name="edit" value="確認する">
        @foreach($supply_user as $k => $val)
          @if($val['contract'] == 3)
            <button>交流を完了する</button>
          @endif
        @endforeach
        <input type="submit" name="delete" value="削除する">
      </div>
    </form>
  </div>
@endsection