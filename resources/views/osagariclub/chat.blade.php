@extends('layouts.users')

@section('title', 'チャット')

@section('css')
  <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
@endsection

@section('container')
  <div class="matcing-ChatRoom-Container">
    <div class="matcing-Infomation">
      <p>チャットで個人情報のやりとりは禁止です。</p>
    </div>
    <div id="app">
      <div class="matcing-ChatRoom-Container-inner">
        <div id="matcing-ChatRoom-Container-Scroll">
          <!--チャット内容表示場所-->
          <div class="chat-Message" v-for="m in chats">
            <div v-if="m.supply_user_id == document.getElementById('supply_user').value">
              <div class="chat-Message-Content" v-if="m.user_id == document.getElementById('login_user').value">
                <span class="my-Chat-Date" v-text="m.created_at"></span>
                <div class="my-Message">
                  <p v-text="m.chat"></p>
                </div>
              </div>
              <div class="chat-Message-Content" v-else>
                <div class="partner-Message">
                  <p v-text="m.chat"></p>
                </div>
                <span class="partner-Chat-Date" v-text="m.created_at"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="matcing-ChatRoom-Container-Form">
        <input type="text" name="chat" placeholder="メッセージを入力してください。" v-model="chat">
        <input type="hidden" id="supply_user" name="supply_user" value="{{ $search_supply['id'] }}">
        <input type="hidden" id="login_user" name="login_user" value="{{ $search_supply['user_id'] }}">
        <button type="button" @click="send()">送信する</button>
      </div>
    </div>
  </div>
  <div class="matching-Button-Container">
    <button>マッチング</button>
  </div>
  <div class="matcingItem-Information-Container">
    <div class="matcingItem-Information-Container-Inner-Title">
      <h2>交流中のおさがり情報</h2>
    </div>
    <div class="matcingItem-Container-Inner">
      <div class="matcingItem-Container-Inner-Image">
        <img src="{{ asset('images/no_image.png') }}">
      </div>
      <div class="matcingItem-Container-Inner-Information">
        <!--ここに情報を入れる-->
        @foreach($supply_user as $k)
          @if($k->supply->id == $search_supply['id'])
            <ul>
              <li>{{ $k->supply->item }}</li>
              <li>{{ $k->supply->size }}</li>
              @foreach(config('const') as $k2)
                @foreach($k2 as $k3 => $val)
                  @if($k3 == $k->supply->condition)
                    <li>{{ $val }}</li>
                  @endif
                @endforeach
              @endforeach
              <li>{{ $k->supply->remarks }}</;>
            </ul>
          @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="matcing-Partner-Container">
    <div class="matcing-Partner-Container-Title">
      <h2>交流相手の情報</h2>
    </div>
    <div class="matcing-Partner-Container-Inner">
      <div class="matcing-Partner-Container-Inner-Image">
        <img src="{{ asset('images/no_image.png') }}">
      </div>
      <div class="matcing-Partner-Container-Inner-Information">
        <!--ここに情報を入れる-->
        @foreach($supply_user as $k)
          @if($k->supply->id == $search_supply['id'])
            @foreach($supply as $k2)
              @if($k2->user->id == $k->supply->user_id)
                <p><span>名前：{{$k2->user->name}}</span></p>
                <p>自己紹介：{{$k2->user->appleal}}</p>
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