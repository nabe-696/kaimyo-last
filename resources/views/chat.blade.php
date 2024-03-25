<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ChatGPTで漢字提案</title>
</head>
<body>
    <h1>あなたの人生と価値観に基づいた漢字提案</h1>
    {{-- フォーム --}}
    <form method="POST" action="{{ url('/chat') }}">
        @csrf
        <div>
            <label>人生で最も大切にしていた価値観は何ですか？</label>
            <textarea rows="4" cols="50" name="value">{{ old('value') }}</textarea>
        </div>
        <div>
            <label>趣味や特技、生涯を通じて情熱を注いだことは何ですか？</label>
            <textarea rows="4" cols="50" name="passion">{{ old('passion') }}</textarea>
        </div>
        <div>
            <label>人生で直面した最大の試練は何でしたか？</label>
            <textarea rows="4" cols="50" name="trial">{{ old('trial') }}</textarea>
        </div>
        <button type="submit">送信</button>
    </form>

    {{-- 結果表示 --}}
    @if(isset($kanji_suggestions))
        <h2>おすすめの漢字候補</h2>
        <ul>
            @foreach($kanji_suggestions as $kanji)
                <li>{{ $kanji }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
