<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('aaaaa') }}
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
                        <h3 class="text-lg font-medium">誰の戒名を作りますか？</h3>
                        <p>以下に名前を入力してください。</p>
                        <input type="text" id="nameInput" placeholder="名前を入力" class="border-2 border-gray-300 p-2 rounded">
                        <button onclick="saveNameAndRedirect()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">保存して進む</button>

                        <select name="gender" id="genderSelect">
                            <option value="male">男性</option>
                            <option value="female">女性</option>
                        </select>


                    </div>
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
        window.location.href = '/ingo'; // ここはfinal.blade.phpにアクセスするためのルート
    } else {
        alert('名前を入力してください！');
    }
}
</script>



