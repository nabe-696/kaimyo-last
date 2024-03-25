<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>戒名表示</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
        .kanji-display {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }
        .kanji-box {
            font-size: 2rem;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            margin: 5px;
            border: 1px solid #333;
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="kanji-display">]
        @php
            $chars = mb_str_split($kanji->characters);

        @endphp
        @foreach ($chars as $char)
                <div class="kanji-box">{{ $char }}</div>
            @endforeach
        </div>
        <a href="{{ route('dashboard') }}" class="btn">ダッシュボードに戻る</a>
    </div>
</body>
</html>
