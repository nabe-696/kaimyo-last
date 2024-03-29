<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaimyoController;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\DougouGptController;
use App\Http\Controllers\KaimyoGptController;
use App\Models\Kaimyo;
use App\Http\Controllers\KanjiController;

Route::get('/', function () {
    return view('welcome');
});

// 戒名作成フォームの表示
// Route::get('/kaimyo/create', [KaimyoController::class, 'create'])->middleware(['auth'])->name('kaimyo.create');

// 戒名作成の処理と保存
// Route::post('/kaimyo', [KaimyoController::class, 'store'])->middleware(['auth'])->name('kaimyo.store');

// 作成された戒名の表示（例：ユーザーIDに基づく）
// Route::get('/kaimyo/{user}', [KaimyoController::class, 'show'])->middleware(['auth'])->name('kaimyo.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 院号ページ
Route::get('/dashboard/ingo', function () {
    return view('ingo');
})->middleware(['auth'])->name('ingo');

// 道号ページ
Route::get('/dashboard/dougo', function () {
    return view('dougo');
})->middleware(['auth'])->name('dougo');

// 戒名ページ
Route::get('/dashboard/kaimyo', function () {
    return view('kaimyo');
})->middleware(['auth'])->name('kaimyo');

// 最終決定ページ
Route::get('/dashboard/final', function () {
    return view('final');
})->middleware(['auth'])->name('final');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//chatgptのapi
Route::get('/ingo', [ChatGptController::class, 'index'])->name('chat_gpt-index');
Route::post('/ingo', [ChatGptController::class, 'chat'])->name('chat_gpt-chat');
Route::get('/dougo', [DougouGptController::class, 'index'])->middleware(['auth'])->name('dougou');
Route::post('/dougo', [DougouGptController::class, 'chat'])->name('dougou-chat');
Route::get('/kaimyo', [KaimyoGptController::class, 'index'])->middleware(['auth'])->name('kaimyo');
Route::post('/kaimyo', [KaimyoGptController::class, 'chat'])->name('kaimyo-chat');

//データベースにぶちこむ
Route::post('/save-kanji', [KanjiController::class, 'store'])->name('save-kanji');

Route::get('/my-kanjis', [KanjiController::class, 'index'])->name('my-kanjis');


//view-kaimyoにひょうじするためのもん
Route::get('/view-kaimyo/{kanji}', [KanjiController::class, 'show'])->name('view-kaimyo');

 // `$kanji`変数に空のデータを渡すか、あるいは渡さない
// Route::get('/view-kaimyo', function() {
   
//     return view('view-kaimyo', ['kanji' => null]);
// })->name('view-kaimyo');


//mypegeに表示
Route::get('/mypage', [KanjiController::class, 'showMyPage'])->middleware(['auth'])->name('mypage');

//編集ページへgo
Route::get('/kanjis/{kanji}/edit', [KanjiController::class, 'edit'])->name('kanji.edit');


Route::put('/kanjis/{kanji}', [KanjiController::class, 'update'])->name('kanji.update');
//削除ページへgo
Route::delete('/kanjis/{kanji}', [KanjiController::class, 'destroy'])->name('kanji.destroy');





require __DIR__.'/auth.php';
