@extends('layouts.normal')

@section('title', 'ユーザーログイン')

@section('container')
  <div class="user-Login-Container">
    <div class="user-Login-Container-Infomation">
      <div class="title-logo">
        <img src="{{ asset('images/Logo-Title.png') }}">
      </div>
      <div class="user-Login-Container-Form">
        <form action="{{ route('user.login') }}" method="post">
          @csrf
          <div class="form-Group">
            <input type="text" name="email" placeholder="メールアドレス">
          </div>
          <div class="form-Group user-Login">
            <input type="password" name="password" placeholder="パスワード">
          </div>
          <div class="btn-Group user-Create pass-reset-btn">
            <input type="submit" value="ログイン">
          </div>
        </form>
            <a href="/pass/reset" class="btn-Group user-Create"><button>パスワード再発行</button></a>
      </div>
    </div>
  </div>
@endsection