<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           院号ページ
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="flex flex-col w-1/6 bg-purple-500 h-screen p-6 space-y-6">
            <a href="{{ route('dashboard') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">トップページ</a>
            <a href="{{ route('ingo') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">院号</a>
            <a href="{{ route('dougo') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">道号</a>
            <a href="{{ route('kaimyo') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">戒名</a>
            <a href="{{ route('final') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">最終決定</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
                
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5" >
                <p class="text-gray-800 dark:text-gray-300 text-lg leading-relaxed mb-4">
                    このページでは院号に使う漢字２文字を選んでもらいます。よく使われる漢字から気に入ったものをクリックしていただき、「漢字を保存して次へ」ボタンを押していただくか、質問に答えていただいて、AIが提案した漢字を漢字１：、漢字２：の欄に記入し、漢字を保存して次へボタンを押してください。
                </p>
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">よく使われる漢字から漢字を選んでクリックしてみよう</h1>
                    <div class="kanji-list justify-center gap-4 p-5">
                        <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center " data-kanji="安"  >安 
                        </button>
                        <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center"  data-kanji="英">英</button>
                        <button  class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="恵">恵</button>
                        <button  class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="温">温</button>
                        <button  class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="賢">賢</button>
                        <button  class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="志">志</button>
                        <button  class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="義">義</button>
                        <button  class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="秀">秀</button>
                        <button  class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="純">純</button>



                    </div>

                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">あなたの人生と価値観に基づいた漢字提案</h1>
                    <form method="POST" action="{{ url('/ingo') }}" class="mb-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="value">
                                人生で最も大切にしていた「価値観」は何ですか？
                            </label>
                            <textarea id="value" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="value">{{ old('value') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="passion">
                                趣味や特技、生涯を通じて「情熱」を注いだことは何ですか？
                            </label>
                            <textarea id="passion" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="passion">{{ old('passion') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="inheritance">
                            あなたが築き上げた「遺産」で最も重要だと思うものは何ですか？また、将来の世代に対して残したいと思うメッセージはありますか？
                            </label>
                            <textarea id="inheritance" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="inheritance">{{ old('inheritance') }}</textarea>
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
                  <!-- ...既存のHTML... -->

          <div id="kanjiInputSection" class="mt-8">
            <form id="kanjiForm">
                <div class="mb-4">
                    <label for="kanji1" class="block text-gray-700 text-sm font-bold mb-2">漢字1:</label>
                    <input type="text" id="kanji1" name="kanji1" maxlength="1" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="kanji2" class="block text-gray-700 text-sm font-bold mb-2">漢字2:</label>
                    <input type="text" id="kanji2" name="kanji2" maxlength="1" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button id="saveKanji" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        漢字を保存して次へ
                    </button>
                </div>
            </form>
        </div>

          <!-- ...既存のHTML... -->

    </div>
</x-app-layout>


<script>
document.addEventListener('DOMContentLoaded', function() {
    // フォームのsubmitイベントを取得する
    const kanjiForm = document.getElementById('kanjiForm');
    kanjiForm.addEventListener('submit', function(event) {
        // デフォルトのフォーム送信を阻止
        event.preventDefault();

        // 漢字の入力値を取得
        const kanji1 = document.getElementById('kanji1').value;
        const kanji2 = document.getElementById('kanji2').value;

        
        if (kanji1.length === 1 && kanji2.length === 1) {
         
            localStorage.setItem('ingo_kanji1', kanji1);
            localStorage.setItem('ingo_kanji2', kanji2);

            // final.blade.phpにリダイレクト
            const basePath = (window.location.hostname === "localhost") ? '/dashboard/dougo' : '/sotsugyou/dashboard/dougo';
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


        // 漢字アイテムがクリックされたときの処理
        item.addEventListener('click', function() {
            const kanji = this.getAttribute('data-kanji');
            const kanji1Input = document.getElementById('kanji1');
            const kanji2Input = document.getElementById('kanji2');
            
            // 漢字1が空、または既に入力されている場合は漢字2へ入力
            if (!kanji1Input.value) {
                kanji1Input.value = kanji;
            } else if (!kanji2Input.value) {
                kanji2Input.value = kanji;
            } else {
                // 両方埋まっている場合は漢字1を更新し、漢字2をクリア
                kanji1Input.value = kanji;
                kanji2Input.value = '';
            }
        });
    });
});
</script>


<style>
  .kanji-list {
    display: flex; /* Flexboxを有効にする */
    flex-wrap: wrap; /* 要素が境界を超えたら折り返す */
    justify-content: center; /* 中央寄せ */
    gap: 1rem; /* 要素間の隙間 */
  }
</style>
