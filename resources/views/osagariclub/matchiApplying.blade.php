@extends('layouts.users')

@section('title', 'マッチ申請中')

@section('container')
  <div class="matcing-Confirm-Container">
    @if($supply_user['contract'] == 3)
      <div class="macting-Confirm-Container-Infomation">
        <p>おめでとうございます！</p>
        <p>交渉が成立しました</p>
      </div>
      <div class="matcing-Confirm-Container-Button">
          <!--getパラメータにある中間テーブルの値をコントローラ側に送る-->
          <a href="/chat/room?match={{$supply_user['id']}}"><button>チャットへ戻る</button></a>
          <a href="/"><button>他のおさがりを探す</button></a>
          <!--getパラメータをつけることで前のチャットページに戻す-->
      </div>
    @else
      <div class="macting-Confirm-Container-Infomation">
        <p>マッチング申請中です。</p>
      </div>
      <div class="matcing-Confirm-Container-Button">
          <a href="/chat/room?match={{$supply_user['id']}}"><button>もどる</button></a>
      </div>
    @endif
  </div>
@endsection