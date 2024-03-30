<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('トップページ') }}
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
        <div class="py-12 w-5/6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-2xl font-semibold mb-4">戒名作成サイトへようこそ</h3>
                    <p class="mb-4">このサイトでは、院号、道号、戒名の3つを組み合わせて、戒名を作成できます。選択肢から気に入った漢字を選んだり、質問に答えてAIに漢字を提案してもらいましょう。</p>
                    <div class="mb-6">
                        <h4 class="text-lg font-medium mb-2">スタートガイド</h4>
                        <p>まずは、以下の入力フォームから名前と性別を選択してください。それから、「保存して進む」ボタンをクリックして次へ進んでください。</p>
                    </div>
                    
                    <div class="mb-4">
                        <label for="nameInput" class="block text-sm font-bold mb-2">名前</label>
                        <input type="text" id="nameInput" placeholder="名前を入力" class="border-2 border-gray-300 p-2 rounded w-full">
                    </div>
                    <div class="mb-4">
                        <label for="genderSelect" class="block text-sm font-bold mb-2">性別</label>
                        <select name="gender" id="genderSelect" class="border-2 border-gray-300 p-2 rounded w-full">
                            <option value="male">男性</option>
                            <option value="female">女性</option>
                        </select>
                    </div>
                    <button onclick="saveNameAndRedirect()" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none">保存して進む</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
function saveNameAndRedirect() {
    const name = document.getElementById('nameInput').value;
    const gender = document.getElementById('genderSelect').value;
    if (name) {
        localStorage.setItem('kaimyo_name', name);
        localStorage.setItem('kaimyo_gender', gender);
        const basePath = (window.location.hostname === "localhost") ? '/dashboard/ingo' : '/sotsugyou/dashboard/ingo';
        window.location.href = basePath; // パスを動的に設定
    } else {
        alert('名前を入力してください！');
    }
}
</script>



