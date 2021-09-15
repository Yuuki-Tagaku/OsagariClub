@extends('layouts.users')

@section('title', '会員情報編集完了')

@section('container')
  <div class="user-Edit-Confirm">
    <div class="user-Edit-Confirm-Container">
      <div class="user-Edit-Confirm-Container-Infomation">
        <div class="user-Edit-Confirm-Container-Infomation-message">
          <p class="confirm-message">会員情報を更新しました</p>
        </div>
      </div>
      <div class="user-Edit-Confirm-Container-Button">
        <div class="btn-Group">
          <a href="/search" class="btn-Group"><button>おさがりを探す</button></a>
          <a href="/supply/index" class="btn-Group"><button>おさがりを登録する</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection