
@extends("layouts.users")

@section('title', 'おさがり詳細')

@section('css')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@endsection

@section('js')
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@endsection

@section("container")
  <div class="supply-Show-Container">
    <div class="supply-Show-Container-Infomation">
      <div class="supply-Show-Container-Image slider">
        <img src="{{ asset('storage/images/supply/'. $supply['image_path1']) }}">
        @if(!empty($supply['image_path2']))
          <img src="{{ asset('storage/images/supply/'. $supply['image_path2']) }}">
        @endif
        @if(!empty($supply['image_path3']))
          <img src="{{ asset('storage/images/supply/'. $supply['image_path3']) }}">
        @endif
        @if(!empty($supply['image_path4']))
          <img src="{{ asset('storage/images/supply/'. $supply['image_path4']) }}">
        @endif
      </div>
      <div class="supply-Show-Container-Info">
        <ul>
          <ol>{{$supply['item']}}</ol>
          <ol>サイズ：{{$supply['size']}}</ol>
          <ol>使用年数：{{$supply['years_used']}}</ol>
          @foreach(config('const')['gender'] as $k => $val)
            @if($supply['gender'] == $k)
              <ol>使用したこどもの性別：{{$val}}</ol>
            @endif
          @endforeach
          <ol>きれい度：
            <div class="condition-Group-Choice">
                @foreach(config('const')['condition'] as $k => $val)
                  @if($supply['condition'] == $k)
                    <span class="color{{$k}} supply-Show-Condition">{{$val}}</span>
                  @else
                    <span class="color{{$k}} supply-Show-Condition no-color">{{$val}}</span>
                  @endif
                @endforeach
            </div>
          </ol>
          <ol>その他：<span>{{$supply['remarks']}}</span></ol>
        </ul>
        @foreach($contract as $k2)
          @if($k2['contract'] == 3 || $k2['contract'] == 4 || $k2['contract'] == 5)
            <p class="contract-Message">このおさがりは募集を終了しています。</p>
            @break
          @else
            @if($user['id'] != $supply['user_id'])
              <div class="btn-Group">
                @if(!empty($supply_user) || count($supply_user) != 0)
                  @foreach($supply_user as $k)
                    @if($user['id'] == $k['user_id'])
                      <a href="/chat/room?match={{$k['id']}}"><button>チャットで連絡する</button></a>
                    @endif
                  @endforeach
                @else
                  <a href="/chat/create?supply={{$supply['id']}}"><button>チャットで連絡する</button></a>
                @endif
              </div>
            @endif
            @break
          @endif
        @endforeach
      </div>
    </div>
    <div class="matcing-Partner-Container supply-Show-Bottom">
      <!--交流相手の情報を置く場所-->
      <div class="matcing-Partner-Container-Title supply-Show">
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
          <p><span>名前：{{$supply->user->name}}</span></p>
          <div class="Appleal">
            <p>自己紹介：
              <div class="partner-Appleal">
                {{$supply->user->appleal}}
              </div>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/supplyShow.js') }}"></script>
@endsection