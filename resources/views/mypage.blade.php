<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="flex flex-col w-1/6 bg-purple-500 h-screen p-6 space-y-6">
            <a href="{{ route('mypage') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">戒名一覧</a>

        </div>

        <!-- Main Content -->
        <div class="py-12 w-5/6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">

                        @if($kanjis->isEmpty())
                            <p>作成された戒名はありません。</p>
                        @else
                            <div class="kanjis">
                                @foreach($kanjis as $kanji)
                                    <div class="kanji-item">
                                      <div class="kanji-name">{{ $kanji->name }}</div>
                                      <div class="kanji-characters">{{ $kanji->characters }}</div>
                                      <div class="kanji-gender">{{ $kanji->gender === 'male' ? '居士' : '大姉' }}</div>
                                             <!-- 編集ボタン -->
                                      <a href="{{ route('kanji.edit', $kanji->id) }}" class="btn btn-secondary">編集</a>
                                      <!-- 削除ボタン -->
                                      <form action="{{ route('kanji.destroy', $kanji->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">削除</button>

                                      </form>
                                      <a href="{{ url('view-kaimyo', $kanji->id) }}" class="btn btn-info">見に行く</a>
                                      </div>
                                @endforeach
                            </div>
                        @endif
                        <a href="{{ route('dashboard') }}">ダッシュボードに戻る</a>
                    </div>
                        <!-- Dashboard's content goes here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<style>
.kanji-item {
    background: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.kanji-item:hover {
  background-color: gainsboro;
}
.kanji-name {
    font-size: 1.2em;
    font-weight: bold;
}
.kanji-characters {
    color: #555;
}
.kanji-gender {
    color: #777;
    font-style: italic;
}
.return-dashboard {
    display: inline-block;
    background-color: #a0522d;
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    margin-top: 20px;
}
.return-dashboard:hover {
    background-color: #8b4513;
}
</style>