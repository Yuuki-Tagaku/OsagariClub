@extends("layouts.users")

@section('title', '登録おさがり一覧')

@section("container")
    <!-- 修正箇所：おさがり検索に戻るというボタンがないので削除しました。 -->
    <div class="supply-Index-Button">
        <a href = "/supplies/create"><button>おさがりを登録する</button></a>
    </div>
    <div class="title-Container supply-Add-List">
        <h2>登録したおさがり一覧</h2>
        <!-- 修正箇所：上のタイトルと同じ高さにペジネーションが存在しないといけないので、同じブロック内にあった方がデザインしやすいため場所を移動しています。 -->
        <!-- 修正箇所：パラメータを保持するペジネーションはいらないので普通のペジネーションに変更してます -->
        {{ $supplies->links() }}
    </div>
    <!-- 修正箇所：今回の一覧表示はデザインからするとテーブルの方が適してると思うのでテーブルに変更してます。 -->
    <table class="my-Supply-Index">
        <tr>
            <th>写真</th>
            <th>カテゴリ</th>
            <th>おさがり名</th>
            <th>最終交流日</th>
            <th></th>
        </tr>
        <!-- おさがりを一つずつ取り出す -->
        @foreach($supplies as $supply)
            <tr>
                <!-- 修正箇所：画像は１枚必ず登録なのでnullは存在しないため削除してます。
                    あとダブルクォーターの中にクォーターを打つときはシングルクォーターでと種類を変えた方がいいです。 -->
                <td><img src = "{{'/storage/images/supply/' .$supply->image_path1 }}"></td>
                <td>
                    <!-- 修正箇所：条件分岐で条件が１つしかないのであればSwitch文は不適切です。if文の方が短く済むし合っています。 -->
                    @foreach($categories as $category)
                        <!-- データベースにあるカテゴリーテーブルのIDというカラムの中の値が、サプライテーブルの中にあるcategori_idというカラム名の中の値と同じ場合というif文になる。 -->
                        @if($category['id'] == $supply->category_id)
                            <!-- ここでカテゴリーテーブルのcategoryというカラム名の値を取り出して表示させている -->
                            <p>{{$category['category']}}</p>
                        @endif
                    @endforeach
                </td>
                <td><p>{{$supply->item}}</p></td>
                <td><p>{{$supply->created_at}}</p></td>
                <!-- 修正箇所：編集画面に移動するだけなのでフォームではなくaタグで対応できる。その方が記述が短い -->
                <td><a><button class= "btn-link" class="card-link">編集</button></a></td>
            </tr>
        @endforeach
    </table>
@endsection
