<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            戒名：戒名の説明
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="flex flex-col w-1/6 bg-purple-500 h-screen p-6 space-y-6">
            <a href="{{ route('dashboard') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">トップページ</a>
            <a href="{{ route('ingo') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">院号</a>
            <a href="{{ route('dougo') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">道号</a>
            <a href="{{ route('kaimyo') }}" class="text-white text-lg font-medium bg-purple-600 hover:bg-purple-600 p-3 rounded">戒名</a>
            <a href="{{ route('final') }}" class="text-white text-lg font-medium hover:bg-purple-600 p-3 rounded">最終決定</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">説明</h1>
                <p class="text-gray-800 dark:text-gray-300 text-lg leading-relaxed mb-4">
                    このページでは戒名に使う漢字２文字を選んでもらいます。<br>戒名は、その人の特徴や大切にしていたことを漢字で表現することが多いです。<br>また、"その人の名前"から漢字をとることも多々あります。<br>では、自分で考えた漢字を入力するか、よく使われる漢字から気に入ったものをクリックしていただき、「漢字を保存して次へ」ボタンを押してください。<br>また、気に入った漢字がなければ、質問に答えていただいて、AIが提案した漢字を道号戒名漢字１：、戒名漢字２：の欄に記入し、漢字を保存して次へボタンを押してください。
                </p>
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">よく使われる漢字から漢字を選んでクリックしてみよう</h1>
                <div class="kanji-list justify-center gap-4 p-5">    
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center " data-kanji="浄" title="浄（じょう）: 清らかで純粋な状態を表します。">浄</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="信" title="信（しん）: 信頼と誠実さを意味します。">信</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="覚" title="覚（かく）: 覚悟と悟り、精神的な目覚めを表します。">覚</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="寿" title="寿（じゅ）: 長寿と幸福を祈る漢字です。">寿</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="大" title="大（だい）: 大きさ、力強さ、重要性を象徴します。">大</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="妙" title="妙（みょう）: 絶妙で神秘的な美しさや深い智慧を表します。">妙</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="行" title="行（ぎょう）: 行動や生き方、実践を意味します。">行</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="光" title="光（こう）: 明るさ、希望、啓発を象徴します。">光</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="円" title="円（えん）: 完全さ、円満な関係や繋がりを意味します。">円</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="福" title="福（ふく）: 幸福と福をもたらすとされます。">福</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="慈" title="慈（じ）: 慈愛深い、思いやりのある心を表します。">慈</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="誠" title="誠（せい）: 誠実さ、真実を意味します。">誠</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="智" title="智（ち）: 知恵と知識、賢明さを象徴します。">智</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="孝" title="孝（こう）: 親への敬愛と尊敬を表します。">孝</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="忠" title="忠（ちゅう）: 忠誠心、誠実さを意味します。">忠</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="仁" title="仁（じん）: 人間愛、慈悲の心を表します。">仁</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="悟" title="悟（ご）: 悟り、真理の理解を意味します。">悟</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="和" title="和（わ）: 調和と平和を象徴します。">和</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="守" title="守（しゅ）: 守ること、保護する力を表します。">守</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="瑞" title="瑞（ずい）: 瑞々しい、吉兆を意味します。">瑞</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="聖" title="聖（せい）: 神聖さ、尊い存在を表します。">聖</button>
                    <button class="kanji-item bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow w-12 h-12 flex items-center justify-center" data-kanji="徳" title="徳（とく）: 道徳的な良さや美徳を表します。">徳</button>

                </div>
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">あなたの人生と価値観に基づいた漢字提案をAIとともに</h1>
                    <form method="POST" action="{{ url('/kaimyo') }}" class="mb-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="influentialPerson">
                            あなたの人生で「最も影響を受けた人物」は誰ですか？その人から何を学びましたか？
                            </label>
                            <textarea id="influentialPerson" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="influentialPerson">{{ old('influentialPerson') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="proudestMoment">
                            あなたが人生で「最も誇りに思う瞬間」はいつですか？
                            </label>
                            <textarea id="proudestMoment" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="proudestMoment">{{ old('proudestMoment') }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="relianceDuringHardship">
                            困難な時期を乗り越えるために「あなたが頼ったもの」は何ですか？
                            </label>
                            <textarea id="relianceDuringHardship" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline" name="relianceDuringHardship">{{ old('relianceDuringHardship') }}</textarea>
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
            <form id="kaimyoKanjiForm">
                <div class="mb-4">
                    <label for="kaimyoKanji1" class="block text-gray-700 text-sm font-bold mb-2">戒名漢字1:</label>
                    <input type="text" id="kaimyoKanji1" name="kaimyoKanji1" maxlength="1" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="kaimyoKanji2" class="block text-gray-700 text-sm font-bold mb-2">戒名漢字2:</label>
                    <input type="text" id="kaimyoKanji2" name="kaimyoKanji2" maxlength="1" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="flex items-center justify-between">
                    <button id="saveKaimyoKanji" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        漢字を保存して次へ
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const kaimyoKanjiForm = document.getElementById('kaimyoKanjiForm');
    kaimyoKanjiForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const kaimyoKanji1 = document.getElementById('kaimyoKanji1').value;
        const kaimyoKanji2 = document.getElementById('kaimyoKanji2').value;

        if (kaimyoKanji1.length === 1 && kaimyoKanji2.length === 1) {
            localStorage.setItem('kaimyo_kanji1', kaimyoKanji1);
            localStorage.setItem('kaimyo_kanji2', kaimyoKanji2);
            const basePath = (window.location.hostname === "localhost") ? '/dashboard/final' : '/sotsugyou/dashboard/final';
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
            const kaimyoKanji1Input = document.getElementById('kaimyoKanji1');
            const kaimyoKanji2Input = document.getElementById('kaimyoKanji2');

            if (!kaimyoKanji1Input.value) {
                kaimyoKanji1Input.value = kanji;
            } else if (!kaimyoKanji2Input.value) {
                kaimyoKanji2Input.value = kanji;
            } else {
                // 両方埋まっている場合は、戒名漢字1を更新して、戒名漢字2をクリアします。
                kaimyoKanji1Input.value = kanji;
                kaimyoKanji2Input.value = '';
            }
        });
    });

    // フォーム送信時の処理を設定
    const kaimyoKanjiForm = document.getElementById('kaimyoKanjiForm');
    kaimyoKanjiForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const kaimyoKanji1 = document.getElementById('kaimyoKanji1').value;
        const kaimyoKanji2 = document.getElementById('kaimyoKanji2').value;

        if (kaimyoKanji1.length === 1 && kaimyoKanji2.length === 1) {
            localStorage.setItem('kaimyo_kanji1', kaimyoKanji1);
            localStorage.setItem('kaimyo_kanji2', kaimyoKanji2);
            const basePath = (window.location.hostname === "localhost") ? '/dashboard/final' : '/sotsugyou/dashboard/final';
            window.location.href = basePath;
        } else {
            alert('漢字は1文字ずつ入力してください。');
        }
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
