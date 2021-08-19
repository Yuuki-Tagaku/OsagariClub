ID：{{$supply->id}}<br>
ユーザーID：{{$supply->user_id}}<br>
カテゴリーID；{{$supply->category_id}}<br>
商品名：{{$supply->item}}<br>
サイズ：{{$supply->size}}<br>
コンディション：{{$supply->condition}}<br>
使用年数：{{$supply->years_used}}<br>
性別：{{$supply->gender}}<br>
備考：{{$supply->remarks}}<br>
写真：{{$supply->image_path1}}<br>

まだ登録は完了してません。本当によろしいいですか？<br>
<a href="/supplies/{{$supply->id}}/edit">編集</a>
<a class="list-group-item" href = "/">完了</a>