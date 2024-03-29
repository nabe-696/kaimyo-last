<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('最終決定ページ') }}
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

                        <!-- 名前の隠しフィールド -->
                        <input type="hidden" name="name" id="nameInput">

                        <input type="hidden" name="gender" id="genderInput">
                        <h1>漢字を入れ替えて、自分の好みの組み合わせに調節しよう</h1>
                        <!-- 送信ボタン -->
                        <button type="submit" class="btn btn-primary mt-4">漢字データを保存</button>
                    </form>
                     
                      <div id="finalKanjiDisplay" class="mt-8">
                        院号
                          <div class="kanji-box" draggable="true">□</div>
                          <div class="kanji-box" draggable="true">□</div>
                        道号
                          <div class="kanji-box" draggable="true">□</div>
                          <div class="kanji-box" draggable="true">□</div>
                        戒名
                          <div class="kanji-box" draggable="true">□</div>
                          <div class="kanji-box" draggable="true">□</div>
                      </div>

                      <div id="userNameDisplay" class="mt-8 text-lg font-semibold">名前: <span id="userName">未設定</span></div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>





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

        // ローカルストレージから名前を取得して表示
    const userName = localStorage.getItem('kaimyo_name') || '';
    document.getElementById('nameInput').value = userName;

    const gender = localStorage.getItem('kaimyo_gender') || '';
    document.getElementById('genderInput').value = gender;

    console.log(gender);

    // ユーザー名を表示用の要素にも設定
    // ここを修正または追加
    if (userName !== '') {
        document.getElementById('userNameDisplay').style.display = 'block';
        document.getElementById('userName').textContent = userName;
    } else {
        document.getElementById('userNameDisplay').style.display = 'none';
    }



    let draggedItem = null;

    // ドラッグされたアイテムを参照する
    document.querySelectorAll('.kanji-box').forEach(item => {
        item.addEventListener('dragstart', function(e) {
            draggedItem = this;
        });

        item.addEventListener('dragover', function(e) {
            e.preventDefault(); // デフォルトの挙動を防ぐ
        });

        item.addEventListener('drop', function(e) {
            e.preventDefault(); // デフォルトの挙動を防ぐ
            if (draggedItem !== this) {
                // ここでアイテムの内容を交換する
                let temp = this.innerText;
                this.innerText = draggedItem.innerText;
                draggedItem.innerText = temp;
                
                const kanjiInputs = document.querySelectorAll('input[name="kanjis[]"]');
                kanjiInputs.forEach((input, index) => {
                input.value = kanjiBoxes[index].innerText;
        });
            }
        });
    });
});



</script>


 




