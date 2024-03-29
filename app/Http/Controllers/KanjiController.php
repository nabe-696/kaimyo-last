<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kanji; 
use Auth;
use Illuminate\Support\Facades\Log;


class KanjiController extends Controller
{
    public function store(Request $request)
    {

    
        $user = Auth::user(); // 現在のユーザーを取得

        $kanji = new Kanji();
        $kanji->name = $request->input('name'); 
        $kanji->characters = implode('', $request->input('kanjis')); // 6文字の漢字を連結して保存
        $kanji->gender = $request->input('gender');
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
    public function show($kanjiId = null)
    {
        $kanji = Kanji::findOrFail($kanjiId);
        // dd($kanji); // ここで変数の中身を確認す
        return view('view-kaimyo', compact('kanji'));
    }


    //mypageに反映
    public function showMyPage()
{
    $user = Auth::user(); 
    $kanjis = $user->kanjis()->get(); // ユーザーに紐付いた漢字データを取得

    return view('mypage', compact('kanjis')); 
}


//編集、削除
    public function edit(Kanji $kanji)
    {
        return view('edit', compact('kanji'));
    }

    public function update(Request $request, Kanji $kanji)
    {
        // バリデーションとデータ更新の処理
        $kanji->update($request->all());
        return redirect()->route('mypage');
    }

    public function destroy(Kanji $kanji)
    {
        $kanji->delete();
        return redirect()->route('mypage');
    }
}



