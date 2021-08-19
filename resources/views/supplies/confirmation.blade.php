<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


<div class = "m-5">
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
</div>
本当に削除しますか？<br>

<form action="/suplies/{{$supply->id}}" method="POST"  type = "hidden">
            <input type="hidden" name="_method" value="DELETE">
             {{ csrf_field() }}
            <button class= "btn-link">削除</button>
</form>
<a href="">戻る</a>
