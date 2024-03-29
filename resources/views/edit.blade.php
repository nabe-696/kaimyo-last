<!-- edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('戒名編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <!-- 編集フォーム -->
                <form method="POST" action="{{ route('kanji.update', $kanji->id) }}">
                    @csrf
                    @method('PUT') <!-- HTTPのPUTメソッドを指定 -->
                    
                    <!-- 名前 -->
                    <div>
                      <label for="name">名前</label>
                      <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $kanji->name }}" required autofocus />
                    </div>

                    <!-- 戒名の文字 -->
                    <div>
                      <label for="characters">戒名の文字</label>
                      <input id="characters" class="block mt-1 w-full" type="text" name="characters" value="{{ $kanji->characters }}" required />
                    </div>

                    <!-- 性別 -->
                    <div>
                        <label for="gender">性別</label>
                        <select id="gender" name="gender" class="block mt-1 w-full" required>
                            <option value="male"{{ $kanji->gender == 'male' ? ' selected' : '' }}>男性</option>
                            <option value="female"{{ $kanji->gender == 'female' ? ' selected' : '' }}>女性</option>
                        </select>
                    </div>

                    <!-- 更新ボタン -->
                    <div class="flex items-center justify-end mt-4">
                      <button type="submit" class="btn btn-primary">
                          {{ __('更新') }}
                      </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
