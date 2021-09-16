@extends('layouts.users')

@section('title', 'マッチ申請中')

@section('container')
  <div class="matcing-Confirm-Container">
    <div class="matcing-Confirm-Container-Infomation">
      @if($supply_user['contract'] == 3)
        <div class="macting-Confirm-Container-Infomation-message">
          <p class="confirm-message match-confirm">おめでとうございます！<br>交渉が成立しました</p>
          <div class="matcing-Confirm-Container-Button">
            <!--getパラメータにある中間テーブルの値をコントローラ側に送る-->
            <a href="/chat/room?match={{$supply_user['id']}}"><button class="confirm-button">チャットへ戻る</button></a>
            <a href="/"><button class="confirm-button">他のおさがりを探す</button></a>
            <!--getパラメータをつけることで前のチャットページに戻す-->
          </div>
        </div>
        <div class="space-contract3"></div>
      @else
        <div class="macting-Confirm-Container-Infomation-Applying">
          <p class="confirm-message match-confirm">マッチング申請中です。</p>
          <div class="matcing-Confirm-Container-Button">
            <a href="/chat/room?match={{$supply_user['id']}}"><button class="confirm-button"> もどる</button></a>
          </div>
        </div>
        <div class="space-contract2"></div>
      @endif
    </div>
  </div>
@endsection