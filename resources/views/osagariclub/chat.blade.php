@extends('layouts.users')

@section('title', 'チャット')

@section('css')
  <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
@endsection

@section('container')
  <div class="matcing-ChatRoom-Container">
    <div class="matcing-Infomation">
      <p>チャットで個人情報のやりとりは禁止です。</p>
    </div>
    <input type="hidden" id="day-confirm" value="{{$dayweek}}">
    <input type="hidden" id="day-confirmed" value="{{$yesterdayweeks}}">
    <div id="app">
      <!--Vue.jsを表示させる場所-->
      <div class="matcing-ChatRoom-Container-inner" id="scroll-inner">
        <!--チャット内容表示場所（orverflowでscroll）-->
        <div class="chat-Message" v-for="m in chats">
          <!--ajaxのgetとpostの返り値をforeachして表示-->
          <div v-if="m.supply_user_id == document.getElementById('supply_user').value">
            <div  v-if="m.user_id == document.getElementById('login_user').value">
              <div class="chat-Message-Content my-Chat">
                <!--ログインユーザーのコメント欄-->
                <div v-if="m.created_day == document.getElementById('day-confirm').value" class="my-Chat-Date">
                  <p>今日<br>@{{m.created_time}}</p>
                </div>
                <div v-else-if="m.created_day == document.getElementById('day-confirmed').value" class="my-Chat-Date">
                  <p>昨日<br>@{{m.created_time}}</p>
                </div>
                <div v-else class="my-Chat-Date">
                  <p>@{{m.created_day}}<br>@{{m.created_time}}</p>
                </div>
                <div class="my-Message">
                  <p v-text="m.chat"></p>
                </div>
              </div>
            </div>
            <div  v-else>
              <div class="chat-Message-Content partner-Chat">
                <!--相手ユーザーのコメント欄-->
                <img src="{{ asset('storage/images/user/bGOlhKukPx6x6GmdZEhWviu7Fk8eOb3JYHmUkrRA.jpg') }}">
                <div class="partner-Message">
                  <p v-text="m.chat"></p>
                </div>
                <div v-if="m.created_day == document.getElementById('day-confirm').value" class="partner-Chat-Date">
                  <p>今日<br>@{{m.created_time}}</p>
                </div>
                <div v-else-if="m.created_day == document.getElementById('day-confirmed').value" class="partner-Chat-Date">
                  <p>昨日<br>@{{m.created_time}}</p>
                </div>
                <div v-else class="partner-Chat-Date">
                  <p>@{{m.created_day}}<br>@{{m.created_time}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="matcing-ChatRoom-Container-Form">
        <!--チャットフォーム-->
        <input type="text" name="chat" placeholder="メッセージを入力します。" v-model="chat">
        <input type="hidden" id="supply_user" name="supply_user" value="{{ $search_supply['id'] }}">
        <input type="hidden" id="login_user" name="login_user" value="{{ $search_supply['user_id'] }}">
        <button type="button" @click="send()">送信する</button>
      </div>
    </div>
  </div>
  <div class="matching-Button-Container">
    <!--ここに条件分岐(contractの値が1でlogin_userのidがsupply_userテーブルのuser_idと同じ場合ボタンを表示)
        ここに条件分岐(contractの値が2でlogin_userのidがsupplyテーブルのuser_idと同じ場合ボタンを表示)
        上の条件分岐でそれぞれに別のタイミングでボタンを表示・非表示させ、２度押しを防止する-->
        <p>お互いにマッチングボタンを押したら取引成立になります。場所や日時を決定し受け渡しましょう。</p>
    <a href="/matchi/confirm?match={{$supply_user_id}}" class="btn-Group"><button>マッチング</button></a>
  </div>
  <div class="matcingItem-Information-Container">
    <!--おさがり情報を置く場所-->
    <div class="matcingItem-Information-Container-Inner-Title">
      <h2>おさがりの情報</h2>
    </div>
    <div class="matcingItem-Container-Inner">
      <div class="matcingItem-Container-Inner-Image">
        <!--おさがり情報画像置き場-->
        <img src="{{ asset('images/no_image.png') }}">
      </div>
      <div class="matcingItem-Container-Inner-Information">
        <!--ここに情報を入れる-->
        @foreach($supply_user as $k)
        <!--中間テーブル情報をforeach-->
          @if($k->supply->id == $search_supply['supply_id'])
          <!--supplyテーブルのidと中間テーブルのsupply_idが同じものに限定-->
            <div>
              <p><span>{{ $k->supply->item }}</span></p>
              <p>サイズ：{{ $k->supply->size }}</p>
              <p>使用年数：{{ $k->supply->years_used }}</p>
              @foreach(config('const')['gender'] as $k3 => $val2)
                @if($k3 == $k->supply->gender)
                  <p>使用したこどもの性別：{{ $val2 }}</p>
                @endif
              @endforeach
              @foreach(config('const')['condition'] as $k2 => $val)
              <!--おさがりのきれい度の数値をconfigフォルダのconstからforeach-->
                  @if($k2 == $k->supply->condition)
                  <!--const内のkeyとsupplyテーブルのconditionが同じものに限定-->
                    <p>きれい度：<span class="color{{$k2}} chatColor">{{ $val }}</span></p>
                  @endif
              @endforeach
              <p class="supply-Remarks">その他：<div class="supply-Remarks-inner">{{ $k->supply->remarks }}</div></p>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="matcing-Partner-Container">
    <!--交流相手の情報を置く場所-->
    <div class="matcing-Partner-Container-Title">
      <h2>おさがりの提供者</h2>
    </div>
    <div class="matcing-Partner-Container-Inner">
      <div class="matcing-Partner-Container-Inner-Image">
        <!--交流相手の登録写真-->
          <!--交流相手の登録写真（if文で画像がない場合はno_imageに変更する）-->
        <img src="{{ asset('images/no_image.png') }}">
      </div>
      <div class="matcing-Partner-Container-Inner-Information">
        <!--ここに情報を入れる-->
        <!--ログインユーザーのidがsupplyテーブルのuser_idと違う場合はsupplyのuser_idから情報を取り出す
            ログインユーザーのidがsupplyテーブルのuser_idと同じ場合はsupply_userのuser_idから情報を取り出す
            上の条件でログインユーザーを判別させ表示ユーザーを切り替える-->
        @foreach($supply_user as $k)
          @if($k->supply->id == $search_supply['id'])
            @foreach($supply as $k2)
              @if($k2->user->id == $k->supply->user_id)
                <p><span>名前：{{$k2->user->name}}</span></p>
                <div class="Appleal">
                  <p>自己紹介：
                    <div class="partner-Appleal">
                      {{$k2->user->appleal}}
                    </div>
                  </p>
                </div>
              @endif
            @endforeach
          @endif
        @endforeach
      </div>
    </div>
  </div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/chat.js') }}"></script>
@endsection