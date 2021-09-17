@extends('layouts.normal')

@section('title', 'ユーザー新規登録')

@section('container')
  <div class="title-Container user-Create-Container user-Create-Top">
    <h2>お客様の情報を登録します。</h2>
  </div>
  <div class="user-Edit-Container user-Create-Container">
    <form action="{{ route('user.create') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="form-Group user-Group">
          <input type="text" name="name" placeholder="名前">
        </div>
        <div class="form-Group user-Group">
          <input type="text" name="email" placeholder="メールアドレス">
        </div>
        <div class="form-Group user-Group">
          <input type="password" name="password" placeholder="パスワード">
        </div>
        <div class="form-Group user-Group">
          <input type="password" name="password_Confirmed" placeholder="パスワード（確認用）">
        </div>
        <div id="profile-Image">
          <p>プロフィール写真を登録します（任意）</p>
          <div class="profile-Image-Inner user-Create">
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
        <div class="profile-Appleal-Container user-Create">
          <p>自己紹介（任意）</p>
          <textarea name="appleal" rows="5"></textarea>
        </div>
        <input type="hidden" name="school_id" value="1">
      <div class="btn-Group user-Create">
        <input type="submit" name="create" value="登録する">
      </div>
    </form>
  </div>
  <script src="{{ asset('js/userForm.js') }}"></script>
@endsection