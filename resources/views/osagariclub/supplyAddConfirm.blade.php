@extends('layouts.users')

@section('title', 'おさがり登録完了')

@section('container')
  <div class="supply-Create-Confirm-Container">
    <div class="supply-Create-Confirm-Container-Infomation">
      <div class="supply-Create-Confirm-Container-Infomation-Applying">
        <p class="confirm-message user-Create-Confirm">登録が完了しました。</p>
        <div class="supply-Create-Confirm-Container-Button user-Welcome-Button">
          <a href="/supply/index" class="user-Create"><button class="confirm-button ">もどる</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection