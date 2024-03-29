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
    </style>
</head>
<body>
    <div class="container">

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
</script>
