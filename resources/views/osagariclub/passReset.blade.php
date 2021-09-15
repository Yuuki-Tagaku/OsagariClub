@extends('layouts.normal')

@section('title', 'ユーザーログイン')

@section('container')
  <div class="pass-Reset-Container">
    <div class="user-Login-Container-Infomation">
      <div class="title-logo">
        <img src="{{ asset('images/Logo-Title.png') }}">
      </div>
      <div class="pass-Reset-Confirm-Container-Infomation-message">
        <p class="confirm-message">パスワードをリセットします。</p>
      </div>
      <div class="pass-Reset-Container-Form">
        <form action="{{ route('password.email') }}" method="post">
          @csrf
          <div class="form-Group">
            <input type="text" name="email" placeholder="メールアドレス">
          </div>
          <div class="btn-Group user-Create">
            <input type="submit" value="パスワードリセット">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection