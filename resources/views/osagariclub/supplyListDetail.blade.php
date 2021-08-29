@extends('layouts.admin')

@section('title', 'おさがり管理')

@section('container')
    <a class="">おさがりを検索します</a>

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
        <label>サイズ</label>
        <input type="search" name="search">
    </form>

    <form action="/" method="post">
        <label>使用年数</label>
        <input type="search" name="search">
    </form>

    <form action="/" method="post">
        <label>着用していた性別</label>
        <input type="radio" name="search" />指定しない
        <input type="radio" name="search" />男
        <input type="radio" name="search" />女
    </form>

    <form action="/" method="post">
        <label>きれい度</label>
        <select>
            <option name="search" value="null">未選択</option>
            <option name="search" value="test">テスト</option>
        </select>
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
                <th scope="col">サイズ</th>
                <th scope="col">使用年数</th>
                <th scope="col">着用していた性別</th>
                <th scope="col">きれい度</th>
                <th scope="col">交流ステータス</th>
                <th scope="col">おさがり登録日</th>
            </tr>
        </thead>
    </table>

    <a>選択したおさがりを</a></br>

    <button type="submit">一括削除</button>

@endsection
