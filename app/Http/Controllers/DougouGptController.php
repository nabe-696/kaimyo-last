<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DougouGptController extends Controller
{
    public function index(Request $request)
    {
        // 道号用のビューを返す
        return view('dougo');
    }

    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'change' => 'required',
            'selfhelp' => 'required',
            'trip' => 'required',
        ]);

        // 入力値の取得
        $change = $request->input('change');
        $selfhelp = $request->input('selfhelp');
        $trip = $request->input('trip');

        // 漢字提案ロジック
        $kanji_suggestions = $this->generateKanjiSuggestions($change, $selfhelp, $trip);

        // dougoビューにデータを渡す
        return view('dougo', compact('change', 'selfhelp', 'trip', 'kanji_suggestions'));
    }

    protected function generateKanjiSuggestions($change, $selfhelp, $trip)
    {
        $api_key = env('CHAT_GPT_KEY');

        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => "あなたは戒名の道号を作成するための漢字を意味も考慮して、ユーザーにふさわしい漢字を提案してくれるお坊さんです。以下の回答に基づいて、おすすめの漢字1文字の候補をそれぞれの回答に対して、2つずつ、計6つ提示してください。また、その漢字の意味も含めて説明してください。"
                ],
                [
                    "role" => "user",
                    "content" => "自分自身の変化: {$change}, 習慣や考え方: {$selfhelp},  人生の目標: {$trip}"
                ]
            ]
        ];

        $client = new Client();
        $response = $client->request('POST', 'https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => "Bearer {$api_key}",
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($data)
        ]);

        $responseBody = json_decode($response->getBody(), true);
        $suggestions = explode(',', $responseBody['choices'][0]['message']['content']);

        return $suggestions;
    }
}
