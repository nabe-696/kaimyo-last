<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>戒名表示</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Serif JP', serif;
            background-color: #f4f4f4;

            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
            border-radius: 10px;
        }
        .kanji-display {
            visibility: hidden; /* 最初は見えないように */
            opacity: 0; /* 最初は完全に透明 */
            transition: visibility 0s, opacity 3s linear; /* visibilityはすぐに変化させ、opacityは3秒かけて変化させる */
            display: flex;
            flex-direction: column;
            align-items: center;
            /* justify-content: space-around;  */
            margin-bottom: 30px;
            background-image: url('/images/ihaidayo.png');
            padding-top: 66px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            width: 100%;
            height: 600px; 
            /* margin: auto; */
                }
        .kanji-display.visible {
            visibility: visible; /* 見えるようにする */
            opacity: 1; /* 完全に不透明にする */
        }
        .kanji-box {
            margin-top: 20px;
            font-size: 2.3rem;
            width: 50px;
            height: 40px;
            line-height: 10px;
            text-align: center;
            margin: 1px auto;
            border: none;
            background-color: #eee;
            border-radius: 5px;
            background: transparent;
        }
        .kanji-box.title {
            background-color: transparent; /* 院のスタイル */
            border: none;
        }
       
        .gender-title {
            font-size: 2.2rem;
            writing-mode: vertical-lr; 
            /* margin-top: 0;
            padding-top: 0; */
           
            /* transform: rotate(180deg); */
        }
        .btn-primary {
            display: inline-block;
            background-color: #a0522d; /* こげ茶色 */
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #8b4513;
        }
        .kanji-box.empty {
            display: none; 
}
        .cherry-blossom-container {
        position: relative;
        height: 100vh; /* コンテナの高さ */
        width: 100%; /* コンテナの横幅 */
        overflow: hidden; /* コンテナからはみ出した要素を隠す */
        }

        /* 桜の花びらのスタイル */
        .petal {
        position: absolute;
        background-color: #ffc0cb; /* 花びらの色 */
        border-radius: 150% 0 150% 0;
        animation: animate-petal 20s linear;
        }

        .petal::after {
        content: "";
        position: absolute;
        top: -14%;
        left: -10%;
        display: block;
        width: 100%;
        height: 100%;
        background-color: #ffc0cb;
        border-radius: 150% 0 150% 0;
        transform: rotate(15deg);
        }

        /* 花びらが降るアニメーション */
        @keyframes animate-petal {
        0% {
            top: 0;
            opacity: 0;
            transform: rotate(0deg);
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            opacity: 0;
            top: 100vh;
            transform: rotate(3000deg);
        }
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="cherry-blossom-container">

    <a href="{{ route('mypage') }}" class="btn btn-primary">マイページへ戻る</a>

    <div class="user-name-display"><span>{{ $kanji->name }}さんの戒名は・・・</span></div>
        <div class="kanji-display">
        @if($kanji)
                @php
                    $chars = mb_str_split($kanji->characters);
                @endphp
                <!-- 最初の2文字 -->
                @for ($i = 0; $i < 2; $i++)
                    <div class="kanji-box">{{ $chars[$i]  }}</div>
                @endfor
                <!-- 「院」の文字 -->
                <div class="kanji-box title">院</div>
                <!-- 残りの4文字 -->
                @for ($i = 2; $i < 6; $i++)
                    <div class="kanji-box">{{ $chars[$i] ?? '□' }}</div>
                @endfor
                <!-- 性別による称号 -->
                <div class="gender-title">
                    @if($kanji->gender == 'male')
                        居士
                    @elseif($kanji->gender == 'female')
                        大姉
                    @endif
                </div>
            @else
                <div>戒名が設定されていません。</div>
            @endif
    </div>
    </div>
</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    var imagePath = '';
    // 環境に応じた画像パスの設定
    if (window.location.hostname === 'localhost') {
        imagePath = '/images/ihaidayo.png';
    } else {
        imagePath = '/sotsugyou/images/ihaidayo.png';
    }
    // 背景画像の設定
    document.querySelector('.kanji-display').style.backgroundImage = 'url(' + imagePath + ')';
});

window.addEventListener('DOMContentLoaded', () => {
  // コンテナを指定
  const section = document.querySelector('.cherry-blossom-container');

  // 花びらを生成する関数
  const createPetal = () => {
    const petalEl = document.createElement('span');
    petalEl.className = 'petal';
    const minSize = 10;
    const maxSize = 15;
    const size = Math.random() * (maxSize + 1 - minSize) + minSize;
    petalEl.style.width = `${size}px`;
    petalEl.style.height = `${size}px`;
    petalEl.style.left = Math.random() * innerWidth + 'px';
    section.appendChild(petalEl);

    // 一定時間が経てば花びらを消す
    setTimeout(() => {
      petalEl.remove();
    }, 20000);
  }

  // 花びらを生成する間隔をミリ秒で指定
  setInterval(createPetal, 600);

      // 戒名を表示する要素を取得する
      setTimeout(() => {
        document.querySelector('.kanji-display').classList.add('visible');
    }, 1000); // 3000ミリ秒で3秒
});
</script>
