@extends('layouts.users')

@section('title', 'マッチ確認画面')

@section('container')
  <div class="matcing-Confirm-Container">
    <div class="matcing-Confirm-Container-Infomation">
      <div class="matcing-Confirm-Container-Infomation-message">
        <p class="confirm-message">マッチングの意思をお相手に伝えます。<br>よろしいですか？</p>
      </div>
    </div>
    <div class="matcing-Confirm-Container-Button">
      <form action="/matchi/confirm" method="post">
        @csrf
        <input type="hidden" name="supply_user_id" value="{{$supply_user_id}}">
        <!--getパラメータにある中間テーブルの値をコントローラ側に送る-->
        <input type="hidden" name="contract" value="1">
        <input type="submit" class="confirm-button" name="edit" value="はい">
      </form>
        <a href="/chat/room?match={{$supply_user_id}}"><button class="confirm-button">もどる</button></a>
        <!--getパラメータをつけることで前のチャットページに戻す-->
    </div>
  </div>
@endsection