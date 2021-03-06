@extends('layouts.admin')

@section('title', 'おさがり管理')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@endsection

@section('container')
    <!--検索フォーム-->
    <div class="container" 　style="padding-left:10px padding-right:10px">
        <form method="GET" action="{{ route('supplylist') }}">
            <div class="row mt-5" style="text-align: center;">
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
                    <label class="">サイズ</label>
                    <input type="text" class="" name="size">
                </div>
                <div class="col-6">
                    <label class="">使用年数</label>
                    <input type="text" class="" name="years_used">
                </div>
            </div>

            <div class="row mt-3" style="text-align: center;">
                <div class="col-6">
                    <label class="">着用していた性別</label>
                    <input type="radio" class="" name="gender">指定なし
                    <input type="radio" class="" name="gender" value="1">男性
                    <input type="radio" class="" name="gender" value="2">女性
                </div>
                <div class="col-6">
                    <label class="">きれい度</label>
                    <select name="conditions" class="">
                        <option value="">未選択</option>

                        @foreach (config('const')['condition'] as $k => $val)
                            <option value="{{ $k }}">
                                {{ $val }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mt-3" style="text-align: center;">
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
        </form>
    </div>
    </div>
    <br />
    <br />



    <div class="container" 　style="padding-left:10px padding-right:10px">
        <div class="row justify-content-center mt-3">
            <a class="row justify-content-center">このおさがりを</a></br>
            <div class="d-grid gap-2 col-6 mx-auto mt-1">
                <button type="submit">削除する</button>
            </div>
        </div>
    </div>

    <a href="/supplylist">Back</a>
@endsection
