@extends('layouts.normal')

@section('title', '登録完了')

@section('container')
  <div class="user-Welcome-Container">
    <div class="user-Welcome-Container-Infomation">
      <div class="title-logo">
        <img src="{{ asset('images/Logo-Title.png') }}">
      </div>
      <div class="user-Welcome-Container-Infomation-Applying">
        <p class="confirm-message user-Create-Confirm">会員登録を完了しました。<br>ありがとうございました。</p>
        <div class="matcing-Confirm-Container-Button user-Welcome-Button">
          <a href="/search" class="user-Create"><button class="confirm-button ">はじめる</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection