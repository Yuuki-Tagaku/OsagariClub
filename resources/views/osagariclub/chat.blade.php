@extends('layouts.users')

@section('title', 'チャット')

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
                @if($search_supply['user_id'] == $user['id'])
                  @foreach($supply as $k)
                    @if($search_supply['supply_id'] == $k['id'])
                      <img src="{{ asset('storage/images/user/'. $k->user->image_path) }}">
                    @endif
                  @endforeach
                @else
                  @foreach($search_user as $k)
                    @if($search_supply['user_id'] == $k['id'])
                      <img src="{{ asset('storage/images/user/'. $k['image_path']) }}">
                    @endif
                  @endforeach
                @endif
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
        <input type="hidden" id="login_user" name="login_user" value="{{ $user['id'] }}">
        <button type="button" @click="send()">送信する</button>
      </div>
    </div>
  </div>
  @if($search_supply['contract'] == 1 && $user['id'] == $search_supply['user_id'])
    <div class="matching-Button-Container">
          <p>お互いにマッチングボタンを押したら取引成立になります。場所や日時を決定し受け渡しましょう。</p>
      <a href="/matchi/confirm?match={{$supply_user_id}}" class="btn-Group"><button>マッチング</button></a>
    </div>
  @elseif($search_supply['contract'] == 2 && $user['id'] == $search['user_id'])
    <div class="matching-Button-Container">
          <p>お互いにマッチングボタンを押したら取引成立になります。場所や日時を決定し受け渡しましょう。</p>
      <a href="/matchi/confirm?match={{$supply_user_id}}" class="btn-Group"><button>マッチング</button></a>
    </div>
  @endif
  <div class="matcingItem-Information-Container">
    <!--おさがり情報を置く場所-->
    <div class="matcingItem-Information-Container-Inner-Title">
      <h2>おさがりの情報</h2>
    </div>
    <div class="matcingItem-Container-Inner">
      <div class="matcingItem-Container-Inner-Image">
        <!--おさがり情報画像置き場-->
        @foreach($supply as $k)
          @if($k->id == $search_supply['supply_id'])
            <img src="{{ asset('storage/images/supply/' . $k->image_path1) }}">  
          @endif
        @endforeach  
      </div>
      <div class="matcingItem-Container-Inner-Information">
        <!--ここに情報を入れる-->
        @foreach($supply as $k)
        <!--中間テーブル情報をforeach-->
          @if($k->id == $search_supply['supply_id'])
          <!--supplyテーブルのidと中間テーブルのsupply_idが同じものに限定-->
            <div>
              <p><span>{{ $k->item }}</span></p>
              <p>サイズ：{{ $k->size }}</p>
              <p>使用年数：{{ $k->years_used }}</p>
              @foreach(config('const')['gender'] as $k3 => $val2)
                @if($k3 == $k->gender)
                  <p>使用したこどもの性別：{{ $val2 }}</p>
                @endif
              @endforeach
              @foreach(config('const')['condition'] as $k2 => $val)
              <!--おさがりのきれい度の数値をconfigフォルダのconstからforeach-->
                  @if($k2 == $k->condition)
                  <!--const内のkeyとsupplyテーブルのconditionが同じものに限定-->
                    <p>きれい度: <span class="color{{$k2}} chatColor">{{$val}}</span></p>
                  @endif
              @endforeach
              <p class="supply-Remarks">その他：<div class="supply-Remarks-inner">{{ $k->remarks }}</div></p>
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
        @if($search_supply['user_id'] == $user['id'])
            @if($search_supply['supply_id'] == $k['id'])
              <img src="{{ asset('storage/images/user/'. $k->user->image_path) }}">
            @endif
          @endforeach
        @else
          @foreach($search_user as $k)
            @if($search_supply['user_id'] == $k['id'])
              <img src="{{ asset('storage/images/user/'. $k['image_path']) }}">
            @endif
          @endforeach
        @endif
      </div>
      <div class="matcing-Partner-Container-Inner-Information">
        <!--ここに情報を入れる-->
        @if($search_supply['user_id'] == $user['id'])
          @foreach($supply as $k)
            @if($search_supply['supply_id'] == $k['id'])
              <p><span>名前：{{$k->user->name}}</span></p>
              <div class="Appleal">
                <p>自己紹介：
                  <div class="partner-Appleal">
                    {{$k->user->appleal}}
                  </div>
                </p>
              </div>
            @endif
          @endforeach
        @else
          @foreach($search_user as $k)
            @if($search_supply['user_id'] == $k['id'])
              <p><span>名前：{{$k['name']}}</span></p>
              <div class="Appleal">
                <p>自己紹介：
                  <div class="partner-Appleal">
                    {{$k['appleal']}}
                  </div>
                </p>
              </div>
            @endif
          @endforeach
        @endif
      </div>
    </div>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
  <script src="{{ asset('js/chats.js') }}"></script>
@endsection