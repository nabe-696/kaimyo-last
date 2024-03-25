<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kanji; // Kanjiモデルを使う
use Auth;

class KanjiController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user(); // 現在のユーザーを取得

        $kanji = new Kanji();
        $kanji->characters = implode('', $request->input('kanjis')); // 6文字の漢字を連結して保存
        $kanji->user_id = $user->id; // ユーザーIDをセット
        $kanji->save();
    
        return redirect()->route('view-kaimyo', ['kanji' => $kanji->id]);
    }

    public function index()
{
    $user = Auth::user(); // 現在のユーザーを取得
    $kanjis = $user->kanjis; // ユーザーに紐付いた漢字データを取得

    return view('kanjis.index', compact('kanjis')); // ビューにデータを渡す
}
    public function show($kanjiId)
    {
        $kanji = Kanji::findOrFail($kanjiId);
        // dd($kanji); // ここで変数の中身を確認す
        return view('view-kaimyo', compact('kanji'));
    }
}
