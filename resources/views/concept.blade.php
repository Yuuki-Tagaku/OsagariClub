<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <title>おさがりくらぶ</title>
    <link rel="stylesheet" href="{{ asset('css/admin-Stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}" media="screen and (max-width: 480px)">
  </head>
  <body>
    <header>
      <div class="concept-Title-Container">
        <a href="#concept"><img src="{{ asset('images/concept.png') }}"></a>
        <a href="#used"><img src="{{ asset('images/used.png') }}"></a>
        <a href="#feature"><img src="{{ asset('images/feature.png') }}"></a>
        <a href="#contact"><img src="{{ asset('images/contact.png') }}"></a>
        <a href=""><img src="{{ asset('images/admin.png') }}"></a>
      </div>
    </header>
    <div class="concept-Title-Image">
      <img src="{{ asset('images/main.png') }}">
    </div>
    <div id="concept">
      <article class="concept-Info-Message-Inner">
        <h3>おさがりを、つなぐ。</h3>
        <p>こどもの成長はとても嬉しいけど、成長とともに手放すものもいっぱい。</p>
        <p>「まだ使えるのになぁ。」</p>
        <p>と、何度おもったことでしょう。</p>
        <br>
        <p>学校指定品は意外と高いから、おさがりで十分。</p>
        <p>「おさがり、もらえたらなぁ。」</p>
        <p>と、何度願ったでしょう。</p>
        <br>
        <p>『おさがりくらぶ』に入れるのは同じ学校の人だけ。</p>
        <p>授業参観であのお母さんみたことあるな。</p>
        <p>なんとなく知ってるいるけど、まだ話したことないな。</p>
        <br>
        <p>そんな人たちと、こどものおさがりをつないでいくサービスです。</p>
      </article>
      <div class="QR">
        <img src="{{ asset('images/localhost8000.png') }}">
      </div>
    </div>
    <div id="used">
      <!-- ステップ１ -->
      <div class="used-Step">
        <div class="used-Step-Inner">
          <img src="{{ asset('images/step1-Left.png') }}">
          <div class="used-Step-Info">
            <p><span>step.1</span></p>
            <p>欲しいおさがりをキーワード検索したり、カテゴリから検索してみる</p>
          </div>
        </div>
        <div class="used-Step-Inner">
          <img src="{{ asset('images/step1-Right.png') }}">
          <div class="used-Step-Info">
            <p><span>step.1</span></p>
            <p>ゆずりたいおさがりの写真や情報を登録します。</p>
          </div>
        </div>
      </div>
      <!-- ステップ２ -->
      <div class="used-Step">
        <div class="used-Step-Inner">
          <img src="{{ asset('images/step2.png') }}">
          <div class="used-Step-Info">
            <p><span>step.2</span></p>
            <p>気に入ったおさがりについてチャットを使って、直接情報を交換します。</p>
          </div>
        </div>
        <div class="used-Step-Inner">
          <img src="{{ asset('images/step2.png') }}">
          <div class="used-Step-Info">
            <p><span>step.2</span></p>
            <p>おさがりをほしい人からコンタクトがあります。お互いの不安を解消しましょう。</p>
          </div>
        </div>
      </div>
      <!-- ステップ３ -->
      <div class="used-Step">
        <div class="used-Step-Inner">
          <img src="{{ asset('images/step3.png') }}">
          <div class="used-Step-Info">
            <p><span>step.3</span></p>
            <p>情報交換してこのおさがりをほしいな。と思ったら「マッチングボタン」をおします。</p>
          </div>
        </div>
        <div class="used-Step-Inner">
          <img src="{{ asset('images/step3.png') }}">
          <div class="used-Step-Info">
            <p><span>step.3</span></p>
            <p>情報交換してこの人にゆずってもいいな。と思ったら「マッチングボタン」をおします。</p>
          </div>
        </div>
      </div>
      <!-- ステップ４ -->
      <div class="used-Step-Last">
        <div class="used-Step-Inner">
          <img src="{{ asset('images/step4.png') }}">
          <div class="used-Step-Info">
            <p><span>step.4</span></p>
            <p>ゆずりたいおさがりの写真や情報を登録します。</p>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div id="feature">
      <div class="feature-title">
        <h3>おさがりくらぶの特徴</h3>
      </div>
      <div class="feature-Container">
        <div class="feature-Container-Inner">
          <img src="{{ asset('images/feature1.png') }}">
          <div class="feature-Info">
            <p><span>同じ学校の人</span></p>
            <p>
              このくらぶに入部できる条件はたった1つ。同じ施設（小学校、幼稚園、保育園など）であること。
              だからまったく知らない人との交流ではなくなり、節度を保った交流がはかれます。</p>
          </div>
        </div>
        <div class="feature-Container-Inner">
          <img src="{{ asset('images/feature2.png') }}">
          <div class="feature-Info">
            <p><span>相手がみえる</span></p>
            <p>
              自己紹介欄を設けました。おさがりの情報と一緒に、
              またチャットをしながら双方向でどんな方なのか確認ができます。
              任意で写真をのせることもできます。
            </p>
          </div>
        </div>
        <div class="feature-Container-Inner">
          <img src="{{ asset('images/feature3.png') }}">
          <div class="feature-Info">
            <p><span>きれい度</span></p>
            <p>
              おさがりで一番気になるのはそのおさがりがきれいかどうか。
              わかりやすい言葉の表現と色を使って6段階で表示。きれい度から検索することも可能です。
            </p>
          </div>
        </div>
        <div class="feature-Container-Inner">
          <img src="{{ asset('images/feature4.png') }}">
          <div class="feature-Info">
            <p><span>事前に写真で確認</span></p>
            <p>
              1つのおさがりに4枚まで写真を登録することができます。
              文字情報だけでなく写真でチェックして、ほしい人の不安、ゆずりたい人の不安を早い段階で解消できます。
            </p>
          </div>
        </div>
        <div class="feature-Container-Inner">
          <img src="{{ asset('images/feature5.png') }}">
          <div class="feature-Info">
            <p><span>こどもの性別表示</span></p>
            <p>
              思春期をむかえるこどもは家族間でも性別を強く意識することがあります。
              おさがりにもこの問題が想定されるため、全部のおさがりに使っていた子どもの性別を表示させます。
            </p>
          </div>
        </div>
        <div class="feature-Container-Inner">
          <img src="{{ asset('images/feature6.png') }}">
          <div class="feature-Info">
            <p><span>お互いマッチング</span></p>
            <p>
              おさがりをほしい人、ゆずりたい人、双方向で気持ちを表現できるシステムにしました。
              どちらか一方向では交渉は成立しません。これによって節度を守った交流が生まれます。
            </p>
          </div>
        </div>
      </div>
    </div>
    <div id="contact">
      <div class="contact-title">
        <h3>おさがりくらぶへお問い合わせ</h3>
      </div>
      <div class="contact-form">
        <form action="" method="post">
          @csrf
          <textarea name="message"></textarea>
          <input type="text" name="name" placeholder="名前">
          <input type="text" name="schoo_name" placeholder="施設名">
          <input type="email" name="email" placeholder="メールアドレス">
        </form>
        <div class="btn-Group">
          <button>送信する</button>
        </div>
      </div>
    </div>
    <footer>
      <div></div>
    </footer>
  </body>
</html>