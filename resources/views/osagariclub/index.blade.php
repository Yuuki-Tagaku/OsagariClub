@extends('layouts.normal')

@section('title', 'おさがりくらぶ')

@section('container')
  <div class="home-Container">
    <div class="title-logo">
      <img src="{{ asset('images/Logo-Title.png') }}">
    </div>
    <div class="btn-Group home-Container-Btn-Group">
      <a href="/user/login" class="btn-Group user-Create"><button>ログイン</button></a>
      <p>または</p>
      <a href="/user/create" class="btn-Group user-Create"><button>新規登録</button></a>
    </div>
  </div>
@endsection