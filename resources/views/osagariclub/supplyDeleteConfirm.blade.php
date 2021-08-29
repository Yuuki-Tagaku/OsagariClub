@extends('layouts.users')

@section('title', 'おさがり削除確認')

@section('container')
    <div class="matcing-Confirm-Container">
        <div class="macting-Confirm-Container-Infomation">
            <p>おさがり情報を削除します。</p>
            <p>本当によろしいですか？</p>
        </div>
        <div class="btn-Group">
            <form action="/delete/confirm" method="post">
                @csrf
                <input type="hidden" name="supply_user_id" value="{{ '1' }}">
                <input type="hidden" name="contract" value="3">
                <input type="submit" name="edit" value="はい">
            </form>
            <a href="/supply/edit?match={{ '1' }}"><button>もどる</button></a>
        </div>
    </div>
@endsection
