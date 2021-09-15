@extends('layouts.normal')

@section('title', 'ユーザーログイン')

@section('container')
  <div class="pass-Forget-Container">
    <div class="user-Login-Container-Infomation">
      <div class="pass-Reset-Confirm-Container-Infomation-message">
        <p class="confirm-message">パスワードを変更します。</p>
      </div>
      <div class="pass-Reset-Container-Form">
        <form action="{{ route('password.update') }}" method="post">
          @csrf
          <div class="form-Group">
            <input type="email" name="email" placeholder="登録しているメールアドレス">
          </div>
          <div class="form-Group">
            <input type="password" name="password" placeholder="新しいパスワード">
          </div>
          <div class="form-Group">
            <input type="password" name="password_confirmation" placeholder="新しいパスワード（確認）">
          </div>
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="btn-Group user-Create">
            <input type="submit" value="変更する">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection