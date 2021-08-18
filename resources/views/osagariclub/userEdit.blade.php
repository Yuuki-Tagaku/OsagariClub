@extends('layouts.users')

@section('title','会員情報変更')

@section('container')
  <div class="title-Container">
    <h2>会員情報変更</h2>
  </div>
  <div class="user-Edit-Container">
    <form action="{{ route('user.branch') }}" method="post" enctype="multipart/form-data">
      @csrf
      <dl>
        <div class="form-Group">
          <dt>名前</dt>
          <dd>
            <input type="text" name="name" value="{{ $user->name }}">
            <span>必須</span>
          </dd>
        </div>
        <div class="form-Group">
          <dt>メールアドレス</dt>
          <dd>
            <input type="text" name="email" value="{{ $user->email }}">
            <span>必須</span>
          </dd>
        </div>
        <div class="form-Group">
          <dt>パスワード</dt>
          <dd>
            <input type="text" name="password">
            <span>必須</span>
          </dd>
        </div>
        <div class="form-Group">
          <dt>パスワード (確認)</dt>
          <dd>
            <input type="text" name="password_Confirmed">
            <span>必須</span>
          </dd>
        </div>
        <div id="profile-Image">
          <dt>写真を登録する（任意）</dt>
          <dd>
            <input type="file" name="image_path">
          </dd>
          <div class="profile-Image-Thumbnail">
            @if(!empty($user->image_path))
              <img src="{{ asset('storage/images/user' . $user->image_path) }}">
            @else
              <img src="{{ asset('images/no_image.png') }}">
            @endif
          </div>
        </div>
        <div class="profile-Appleal-Container">
          <dt>自己紹介（任意）</dt>
          <dd>
            <textarea name="appleal" rows="4" cols="34">{{$user->appleal}}</textarea>
          </dd>
        </div>
        <input type="hidden" name="id" value="{{ $user->id }}">
      </dl>
      <div class="btn-Group">
        <input type="submit" name="edit" value="更新">
        <input type="submit" name="delete" value="退会">
      </div>
    </form>
  </div>
@endsection