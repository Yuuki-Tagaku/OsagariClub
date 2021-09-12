@extends("layouts.users")

@section('title', '交流中のおさがり一覧')

@section("container")
    <div class="title-Container supply-Add-List">
        <h2>交流中のおさがり一覧</h2>
        {{ $supply->links() }}
    </div>
    <table class="my-Supply-Index my-Chat-Index">
        <tr>
            <th>写真</th>
            <th>カテゴリ</th>
            <th>おさがり名</th>
            <th>最終交流日</th>
            <th></th>
        </tr>
        @foreach($supply as $k)
            @foreach($k->supply_user as $k2)
                @if($user['id'] == $k['user_id'] || $k2['user_id'] == $user['id'])
                    <tr>
                        <td><img src = "{{'/storage/images/supply/' .$k->image_path1 }}"></td>
                        <td>
                            @foreach($categories as $category)
                                @if($category['id'] == $k->category_id)
                                    <p>{{$category['category']}}</p>
                                @endif
                            @endforeach
                        </td>
                        <td><p>{{$k->item}}</p></td>
                        @foreach($chats as $chat)
                            @if($chat['supply_user_id'] == $k2['id'])
                                @if(!empty($chat['created_at']))
                                    @if($user['id'] == $k['user_id'] || $user['id'] == $k2['user_id'])
                                        <td><p>{{$chat->created_at->format('Y-m-d')}}</p></td>
                                        @break
                                    @endif
                                @else
                                    @if($user['id'] == $k['user_id'] || $user['id'] == $k2['user_id'])
                                        <td><p>{{$chat->created_at}}</p></td>
                                        @break
                                    @endif
                                @endif
                            @endif
                        @endforeach
                        <td><a href="/chat/room?match={{$k2->id}}" class="supply-Edit-Btn">チャット</a></td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </table>
@endsection
