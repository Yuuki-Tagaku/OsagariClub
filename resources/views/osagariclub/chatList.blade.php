@extends('layouts.admin')

@section('title', 'おさがり管理')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection

@section('container')
    <a class="">おさがりを検索します</a>

    <!--検索フォーム-->
    <div class="container" 　style="padding-left:10px padding-right:10px">
        <form method="GET" action="{{ route('supplylist') }}">
            <div class="row mt-3" style="text-align: center;">
                <div class="col-6">
                    <label class="">おさがり名</label>
                    <input type="text" class="" name="item">
                </div>
                <!--プルダウンカテゴリ選択-->
                <div class="col-6">
                    <label class="">カテゴリ</label>
                    <select name="category_id" class="">
                        <option value="">未選択</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">
                                {{ $category['category'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3" style="text-align: center;">
                <div class="col-6">
                    <label class="">名前</label>
                    <input type="text" class="" name="size">
                </div>
                <div class="col-6">
                    <label class="">交流のステータス</label>
                    <input type="radio" class="" name="machi">指定なし
                    <input type="radio" class="" name="machi">交流前
                    <input type="radio" class="" name="machi">交流中
                    <input type="radio" class="" name="machi">マッチング後
                </div>
            </div>
            <div class="row justify-content-center mt-3" style="text-align: center;">
                <div class="col-12">
                    <label class="">おさがり登録日</label>
                    <input type="date" name="from" placeholder="from_date">
                    <span class="mx-3 text-grey">~</span>
                    <input type="date" name="until" placeholder="until_date">
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto mt-3">
                <button type="submit" class="">検索</button>
            </div>
        </form>
    </div>
    </div>
    <br />
    <br />
    @if ($supply)
        <div class="container" 　style="padding-left:10px padding-right:10px">
            <div class="row justify-content-center mt-3">
                <table>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">おさがり名</th>
                        <th scope="col">カテゴリ</th>
                        <th scope="col">名前</th>
                        <th scope="col">交流のステータス</th>
                        <th scope="col">おさがり登録</th>
                    </tr>
                    @foreach ($supply as $k)
                        <tr>
                            <!--ここにtdでチエックボックス-->
                            <!--DBのカラム名itemを載せたい-->
                            <td input type="checkbox" value="" id="">
                            <td>{{ $k['item'] }}</td>
                            <td>{{ $k['category'] }}</td>
                            <td>{{ $k['user_name'] }}</td>
                            <td></td>
                            <td></td>
                            <td><li class="list-group-item">
                                <form action="/supplies/{{$supply->id}}/edit"  type = "hidden">
                                <button class= "btn-link" class="card-link">編集</button>
                                </form>
                            </li></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endif

    <div class="container" 　style="padding-left:10px padding-right:10px">
        <div class="row justify-content-center mt-3">
            <a class="row justify-content-center">選択したおさがりを</a></br>
            <div class="d-grid gap-2 col-6 mx-auto mt-1">
                <button type="submit">一括削除</button>
            </div>
        </div>
    </div>

@endsection
