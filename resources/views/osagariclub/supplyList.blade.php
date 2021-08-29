@extends('layouts.admin')

@section('title', 'おさがり管理')

@section('container')
    <a class="">おさがりを検索します</a>

    <!--検索フォーム-->
    <div class="">
        <div class="">
            <form method="GET" action="{{ route('supplylist') }}">
                <div class="">
                    <label class="">おさがり名</label>
                    <input type="text" class="" name="item" value="{{ $item }}">
                </div>
                <!--プルダウンカテゴリ選択-->
                <div class="">
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
                <div class="">
                    <label class="">サイズ</label>
                    <input type="text" class="" name="size" value="{{ $size }}">
                </div>
                <div class="">
                    <label class="">使用年数</label>
                    <input type="text" class="" name="years_used" value="{{ $years_used }}">
                </div>
                <div class="">
                    <label class="">着用していた性別</label>
                    <input type="radio" class="" name="gender">指定なし
                    <input type="radio" class="" name="gender" value="men">男性
                    <input type="radio" class="" name="gender" value="women">女性
                </div>
                <div class="">
                    <label class="">きれい度</label>
                    <select name="condition" class="">
                        <option value="">未選択</option>

                        @foreach (config('const')['condition'] as $k => $val)
                            <option value="{{ $k }}">
                                {{ $val }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label class="">交流のステータス</label>
                    <input type="radio" class="" name="machi">指定なし
                    <input type="radio" class="" name="machi" value="">交流前
                    <input type="radio" class="" name="machi" value="">交流中
                    <input type="radio" class="" name="machi" value="">マッチング後
                </div>
                <div class="">
                    <label class="">おさがり登録日</label>
                    <input type="date" name="from" placeholder="from_date">
                    <span class="mx-3 text-grey">~</span>
                    <input type="date" name="until" placeholder="until_date">
                </div>
                <div class="">
                    <button type="submit" class="">検索</button>
                </div>
            </form>
        </div>
    </div>

    @if (isset($item))
    <table>
        <tr><th>おさがり名</th></th>
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
    </table>
    @endif

    <a>選択したおさがりを</a></br>
    <button type="submit">一括削除</button>

@endsection
