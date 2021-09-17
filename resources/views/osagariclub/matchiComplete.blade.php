@extends('layouts.users')

@section('title', '会員情報編集完了')

@section('container')
  <div class="matchi-complete-Confirm">
    <div class="matchi-complete-Confirm-Container">
      <div class="matchi-complete-Confirm-Container-Infomation">
        <div class="matchi-complete-Confirm-Container-Infomation-message">
          <p class="confirm-message">交流を完了します。<br>本当によろしいですか？</p>
        </div>
      </div>
      <div class="matchi-complete-Confirm-Container-Button">
        <div class="btn-Group">
          <form action="/matchi/complete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$supply['id']}}">
            <div class="btn-Group user-Create complete-message">
              <input type="submit" name="delete" value="はい">
            </div>
          </form>
          <a href="/supply/edit?supply={{$supply['id']}}" class="btn-Group user-Create"><button>もどる</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection