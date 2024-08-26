<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            道号ページ：道号の説明
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="flex flex-col w-1/6 bg-purple-500 h-screen p-6 space-y-6">
            <a href="{{ route('dashboard') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">トップページ</a>
            <a href="{{ route('ingo') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">院号</a>
            <a href="{{ route('dougo') }}" class="text-white text-lg font-medium bg-purple-600 hover:bg-purple-600 p-3 rounded">道号</a>
            <a href="{{ route('kaimyo') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">戒名</a>
            <a href="{{ route('final') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">最終決定</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">説明</h1>
                <p class="text-gray-800 dark:text-gray-300 text-lg leading-relaxed mb-4">
                    このページでは道号に使う漢字２文字を選んでもらいます。<br>道号とは、個人のライフワークや心掛け、自然を象徴する漢字を使います。<br>自分で考えた漢字を入力するか、よく使われる漢字から気に入ったものをクリックしていただき、「漢字を保存して次へ」ボタンを押していただください。<br> また、気に入った漢字がなければ、質問に答えていただいて、AIが提案した漢字を道号漢字１：、道号漢字２：の欄に記入し、漢字を保存して次へボタンを押してください。
                </p>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">よく使われる漢字から漢字を選んでクリックしてみよう</h1>
                <div class="kanji-list justify-center gap-4 p-5">
                    <!-- 既存のボタン -->
     
                    <!-- 追加する漢字のボタン -->
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="歌" title="歌（か）: 表現と感情の豊かさを象徴します。">歌
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="書" title="書（しょ）: 学問と知識、文化的な伝承を意味します。">書
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="葉" title="葉（よう）: 新生と成長、自然の恵みを表します。">葉
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="海" title="海（かい）: 広大無辺、深遠なる知識や感情の象徴です。">海
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="水" title="水（すい）: 流れと変化、生命の源を象徴します。">水
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="頂" title="頂（ちょう）: 頂点に立つこと、目指す高みを表します。">頂
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="華" title="華（か）: 華麗で美しい、または華やかさを象徴します。">華
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="窓" title="窓（そう）: 新しい視点や外界への開かれた窓口を意味します。">窓
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="樹" title="樹（じゅ）: 生命と成長、強さと安定を象徴します。">樹
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="流" title="流（りゅう）: 流れと進展、変動の象徴です。">流
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="竹" title="竹（ちく）: 強さと柔軟性、簡素な美を意味します。">竹
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="文" title="文（ぶん）: 文化と教養、文学の象徴です。">文
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="山" title="山（さん）: 高さと堅牢さ、自然との調和を象徴します。">山
                    </button>

                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="石" title="石（せき）: 強固で不変の象徴です。">石
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="林" title="林（りん）: 多くの木々、自然との調和を表します。">林
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="空" title="空（くう）: 空間や自由、無の概念を象徴します。">空
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="月" title="月（げつ）: 変化とリズム、美しさを表します。">月
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="花" title="花（か）: 美と儚さ、自然の美しさを象徴します。">花
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="星" title="星（せい）: 希望と遠い目標、導きの光を意味します。">星
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="泉" title="泉（せん）: 生命の源、清らかな水の象徴です。">泉
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="鳥" title="鳥（ちょう）: 自由と旅の象徴、天への憧れを表します。">鳥
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="風" title="風（ふう）: 変化と新しい始まり、力強さを象徴します。">風
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="雲" title="雲（うん）: 移り変わりや夢、高い志を象徴します。">雲
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="雪" title="雪（せつ）: 純白と清潔、静寂と冷静さを意味します。">雪
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="桜" title="桜（おう）: 美しさと刹那、日本の美意識を表します。">桜
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="川" title="川（せん）: 流れと成長、生命の営みを象徴します。">川
                    </button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" 
                        data-kanji="岩" title="岩（がん）: 堅固で不動の強さと安定を意味します。">岩
                    </button>

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
                            <textarea id="selfhelp" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="selfhelp">{{ old('selfhelp') }}</textarea>
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
                                    <li class="text-gray-700 dark:text-gray-300">{!! nl2br(e($kanji)) !!}</li>
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


<style>
  .kanji-list {
    display: flex; /* Flexboxを有効にする */
    flex-wrap: wrap; /* 要素が境界を超えたら折り返す */
    justify-content: center; /* 中央寄せ */
    gap: 1rem; /* 要素間の隙間 */
  }
</style>
