@extends('layouts.users')

@section('title', 'マッチ確認画面')

@section('container')
  <div class="matcing-Confirm-Container">
    <div class="macting-Confirm-Container-Infomation">
      <p>マッチングの意思をお相手に伝えます</p>
      <p>よろしいですか？</p>
    </div>
    <div class="matcing-Confirm-Container-Button">
      <form action="/matchi/confirm" method="post">
        @csrf
        <input type="hidden" name="supply_user_id" value="{{$supply_user_id}}">
        <!--getパラメータにある中間テーブルの値をコントローラ側に送る-->
        <input type="hidden" name="contract" value="1">
        <input type="submit" name="edit" value="はい">
      </form>
        <a href="/chat/room?match={{$supply_user_id}}"><button>いいえ</button></a>
        <!--getパラメータをつけることで前のチャットページに戻す-->
    </div>
  </div>
@endsection