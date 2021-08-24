@extends('layouts.users')

@section('title','会員情報変更')

@section('js')
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
@endsection

@section('container')
  <div class="title-Container">
    <h2>会員情報を編集します。</h2>
  </div>
  <div class="user-Edit-Container">
    <form action="{{ route('user.branch') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-Group">
          <input type="text" name="name" value="{{ $user->name }}" placeholder="名前">
        </div>
        <div class="form-Group">
          <input type="text" name="email" value="{{ $user->email }}" placeholder="メールアドレス">
        </div>
        <div class="form-Group">
          <input type="text" name="password" placeholder="パスワード">
        </div>
        <div class="form-Group">
          <input type="text" name="password_Confirmed" placeholder="パスワード（確認用）">
        </div>
        <div id="profile-Image">
          <p>プロフィール写真を登録します（任意）</p>
          <div class="profile-Image-Inner">
            <label>画像をアップロード<input type="file" name="image_path" class="imgFile"></label>
            <div class="profile-Image-Thumbnail">
              @if(!empty($user->image_path))
                <img src="{{ asset('storage/images/user' . $user->image_path) }}">
              @else
                <img id="img">
              @endif
            </div>
          </div>
        </div>
        <div class="profile-Appleal-Container">
          <p>自己紹介（任意）</p>
            <textarea name="appleal" rows="5" cols="46%">{{$user->appleal}}</textarea>
        </div>
        <input type="hidden" name="id" value="{{ $user->id }}">
      <div class="btn-Group">
        <input type="submit" name="edit" value="更新する">
        <input type="submit" name="delete" value="退会する">
      </div>
    </form>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('js/userForm.js') }}"></script>
@endsection