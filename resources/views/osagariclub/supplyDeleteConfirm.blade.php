@extends('layouts.users')

@section('title', '会員情報編集完了')

@section('container')
  <div class="supply-Delete-Confirm">
    <div class="supply-Delete-Confirm-Container">
      <div class="supply-Delete-Confirm-Container-Infomation">
        <div class="supply-Delete-Confirm-Container-Infomation-message">
          <p class="confirm-message">おさがり情報を削除します。<br>本当によろしいですか？</p>
        </div>
      </div>
      <div class="supply-Delete-Confirm-Container-Button">
        <div class="btn-Group">
          <form action="/supply/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$supply['id']}}">
            <div class="btn-Group user-Create">
              <input type="submit" name="delete" value="はい">
            </div>
          </form>
          <a href="/supply/edit?supply={{$supply['id']}}" class="btn-Group user-Create"><button>もどる</button></a>
        </div>
      </div>
    </div>
  </div>
@endsection