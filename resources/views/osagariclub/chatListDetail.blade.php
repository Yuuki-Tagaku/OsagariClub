@extends('layouts.admin')

@section('title', 'チャット管理')

@section('container')
<a class="">チャットを検索します</a>

    <form action="/" method="post">
        <label>おさがり名</label>
        <input type="search" name="search">
    </form>

    <form action="/" method="post">
        <label>カテゴリ</label>
        <select>
            <option name="search" value="null"></option>
            <option name="search" value="test">テスト</option>
        </select>
    </form>

    <form action="/" method="post">
        <label>名前</label>
        <input type="search" name="search">
    </form>

    <form action="/" method="post">
        <label>交流ステータス</label>
        <input type="radio" name="search" />指定しない
        <input type="radio" name="search" />交流前
        <input type="radio" name="search" />交流中
        <input type="radio" name="search" />マッチング後
    </form>

    <form action="hashtag" method="GET">
        <input type="date" name="from" placeholder="from_date">
        <span class="mx-3 text-grey">~</span>
        <input type="date" name="until" placeholder="until_date">
    </form>

    <button type="submit">検索する</button>

    <table>
        <thead>
            <tr>
                <th scope="col">おさがり名</th>
                <th scope="col">カテゴリ</th>
                <th scope="col">名前</th>
                <th scope="col">交流ステータス</th>
                <th scope="col">おさがり登録日</th>
            </tr>
        </thead>
    </table>

    <a>選択したチャットを</a></br>

    <button type="submit">一括削除</button>
@endsection