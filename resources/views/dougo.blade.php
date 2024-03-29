<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            道号ページ：道号の説明
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="flex flex-col w-1/6 bg-orange-500 h-screen p-6 space-y-6">
            <a href="{{ route('dashboard') }}" class="text-white text-lg font-medium hover:bg-orange-600 p-3 rounded">トップページ</a>
            <a href="{{ route('ingo') }}" class="text-white text-lg font-medium hover:bg-orange-600 p-3 rounded">院号</a>
            <a href="{{ route('dougo') }}" class="text-white text-lg font-medium hover:bg-orange-600 p-3 rounded">道号</a>
            <a href="{{ route('kaimyo') }}" class="text-white text-lg font-medium hover:bg-orange-600 p-3 rounded">戒名</a>
            <a href="{{ route('final') }}" class="text-white text-lg font-medium hover:bg-orange-600 p-3 rounded">最終決定</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">よく使われる漢字から漢字を選んでクリックしてみよう</h1>
                <div class="kanji-list flex flex-wrap justify-center gap-4 p-5">
                    <!-- 既存のボタン -->
     
                    <!-- 追加する漢字のボタン -->
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center " data-kanji="歌">歌</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center "  data-kanji="書">書</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center "  data-kanji="窓">窓</button>
                    <!-- 他の漢字も同様に追加 -->
                </div>
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">あなたの人生と価値観に基づいた漢字提案</h1>
                    <form method="POST" action="{{ url('/dougo') }}" class="mb-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="change">
                            あなたが人生で経験した「変化」で最も影響力のあったものは何ですか？
                            </label>
                            <textarea id="change" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="change">{{ old('change') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="selfhelp">
                            「自己啓発」においてあなたを最も助けた習慣や考え方は何ですか？
                            </label>
                            <textarea id="effet" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="selfhelp">{{ old('selfhelp') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="trip">
                            あなたが「人生の旅」で目指している究極の目標は何ですか？
                            </label>
                            <textarea id="trip" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="trip">{{ old('trip') }}</textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                送信
                            </button>
                        </div>
                    </form>

                    {{-- 結果表示 --}}
                    @if(isset($kanji_suggestions))
                        <div class="bg-indigo-100 dark:bg-indigo-900 p-5 rounded shadow-md">
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">おすすめの漢字候補</h2>
                            <ul class="list-disc list-inside space-y-2">
                                @foreach($kanji_suggestions as $kanji)
                                    <li class="text-gray-700 dark:text-gray-300">{{ $kanji }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div id="kanjiInputSection" class="mt-8">
            <form id="kanjiForm">
                <div class="mb-4">
                    <label for="dougoKanji1" class="block text-gray-700 text-sm font-bold mb-2">道号漢字1:</label>
                    <input type="text" id="dougoKanji1" name="dougoKanji1" maxlength="1" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="dougoKanji2" class="block text-gray-700 text-sm font-bold mb-2">道号漢字2:</label>
                    <input type="text" id="dougoKanji2" name="dougoKanji2" maxlength="1" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button id="saveDougoKanji" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        漢字を保存して次へ
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kanjiForm = document.getElementById('kanjiForm');
    kanjiForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const dougoKanji1 = document.getElementById('dougoKanji1').value;
        const dougoKanji2 = document.getElementById('dougoKanji2').value;

        if (dougoKanji1.length === 1 && dougoKanji2.length === 1) {
            localStorage.setItem('dougo_kanji1', dougoKanji1);
            localStorage.setItem('dougo_kanji2', dougoKanji2);
            const basePath = (window.location.hostname === "localhost") ? '/dashboard/kaimyo' : '/sotsugyou/dashboard/kaimyo';
            window.location.href = basePath;
        } else {
            alert('漢字は1文字ずつ入力してください。');
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.kanji-item').forEach(item => {
        item.addEventListener('click', function() {
            const kanji = this.getAttribute('data-kanji');
            const dougoKanji1Input = document.getElementById('dougoKanji1'); // 変数名を修正
            const dougoKanji2Input = document.getElementById('dougoKanji2'); // 変数名を修正

            // 漢字1が空、または既に入力されている場合は漢字2へ入力
            if (!dougoKanji1Input.value) {
                dougoKanji1Input.value = kanji;
            } else if (!dougoKanji2Input.value) {
                dougoKanji2Input.value = kanji; // 正しい変数名に修正
            } else {
                // 両方埋まっている場合は漢字1を更新し、漢字2をクリア
                dougoKanji1Input.value = kanji;
                dougoKanji2Input.value = '';
            }
        });
    });
});

</script>


