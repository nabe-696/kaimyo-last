<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard!!!') }}
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
        <div class="py-12 w-5/6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="kanjiSaveForm" action="{{ route('save-kanji') }}" method="POST">
                        @csrf
                        <!-- 隠しフィールドで漢字データを保持 -->
                        <input type="hidden" name="kanjis[]" id="kanjiData1">
                        <input type="hidden" name="kanjis[]" id="kanjiData2">
                        <input type="hidden" name="kanjis[]" id="kanjiData3">
                        <input type="hidden" name="kanjis[]" id="kanjiData4">
                        <input type="hidden" name="kanjis[]" id="kanjiData5">
                        <input type="hidden" name="kanjis[]" id="kanjiData6">
                        <!-- 送信ボタンを追加 -->
                        <button type="submit" class="btn btn-primary mt-4">漢字データを保存</button>
                    </form>
                     
                      <div id="finalKanjiDisplay" class="mt-8">
                          <div class="kanji-box">□</div>
                          <div class="kanji-box">□</div>
                          <div class="kanji-box">□</div>
                          <div class="kanji-box">□</div>
                          <div class="kanji-box">□</div>
                          <div class="kanji-box">□</div>
                      </div>

                        <!-- Dashboard's content goes here -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>

<!-- 漢字データを送信するためのフォーム -->



<style>
.kanji-box {
    display: inline-block;
    font-size: 2rem;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    margin: 0 5px;
    border: 1px solid #000;
}
</style>

<!-- final.blade.php -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ローカルストレージから各漢字データを取得
    const kanjis = [
        localStorage.getItem('ingo_kanji1') || '',
        localStorage.getItem('ingo_kanji2') || '',
        localStorage.getItem('dougo_kanji1') || '',
        localStorage.getItem('dougo_kanji2') || '',
        localStorage.getItem('kaimyo_kanji1') || '',
        localStorage.getItem('kaimyo_kanji2') || '',
    ];

    // 各漢字データを画面のボックスに設定
    const kanjiBoxes = document.querySelectorAll('.kanji-box');
    kanjiBoxes.forEach((box, index) => {
        box.innerText = kanjis[index] || '□';
    });

    // 各漢字データをフォームの隠しフィールドに設定
    const kanjiInputs = document.querySelectorAll('input[name="kanjis[]"]');
    kanjiInputs.forEach((input, index) => {
        input.value = kanjis[index];
    });
});


</script>

 




