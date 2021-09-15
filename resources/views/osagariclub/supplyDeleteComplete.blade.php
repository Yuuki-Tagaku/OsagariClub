@extends('layouts.users')

@section('title', 'おさがり登録完了')

@section('container')
  <div class="supply-Delete-Complete-Container">
    <div class="supply-Create-Confirm-Container-Infomation">
      <div class="supply-Create-Confirm-Container-Infomation-Applying">
        <p class="confirm-message user-Create-Confirm">おさがり情報を削除しました。</p>
        <div class="supply-Create-Confirm-Container-Button user-Welcome-Button">
          <a href="/search" class="user-Create"><button class="confirm-button ">おさがりを探す</button></a>
          <a href="/supply/index" class="user-Create"><button class="confirm-button ">おさがりを登録する</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection