@extends('layouts.users')

@section('title', 'マイページ')

@section('container')
  <div class="title-Container">
    <h2>お客様の会員情報です。</h2>
  </div>
  <div class="user-Show-Container">
    <div class="user-Show-Container-Info">
      <p>{{$user['name']}}</p>
      <p>{{$user['email']}}</p>
    </div>
    <div class="user-Show-Container-Image">
      <p>プロフィール写真（任意）</p>
      @if(!empty($user['image_path']))
        <div class="user-Image">
          <img src="{{ asset('storage/images/user/' . $user['image_path']) }}">
        </div>
      @else
        <img src="{{ asset('images/no_image.png') }}">
      @endif
    </div>
    <div class="user-Show-Container-Appleal">
      <p>自己紹介（任意）</p>
      @if(!empty($user['appleal']))
        <p class="user-Appleal">{{$user['appleal']}}</p>
      @else
        <p class="user-Appleal">なし</p>
      @endif
    </div>
    <div class="btn-Group">
      <a href="/user/edit" class="btn-Group"><button>編集する</button></a>
      <a href="/logout" class="btn-Group"><button class="logout">ログアウト</button></a>
    </div>
  </div>
@endsection