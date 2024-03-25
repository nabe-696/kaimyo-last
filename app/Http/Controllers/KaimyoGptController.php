<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class KaimyoGptController extends Controller
{
    public function index(Request $request)
    {
        // 道号用のビューを返す
        return view('kaimyo');
    }

    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'value' => 'required',
            'passion' => 'required',
            'trial' => 'required',
        ]);

        // 入力値の取得
        $value = $request->input('value');
        $passion = $request->input('passion');
        $trial = $request->input('trial');

        // 漢字提案ロジック
        $kanji_suggestions = $this->generateKanjiSuggestions($value, $passion, $trial);

        // kaimyoビューにデータを渡す
        return view('kaimyo', compact('value', 'passion', 'trial', 'kanji_suggestions'));
    }

    protected function generateKanjiSuggestions($value, $passion, $trial)
    {
        $api_key = env('CHAT_GPT_KEY');

        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => "あなたは戒名の道号を作成するための漢字を漢字の意味も考慮して、ユーザーにふさわしい漢字を提案してくれるお坊さんです。以下の回答に基づいて、おすすめの漢字1文字の候補をそれぞれの回答に対して、2つずつ、計6つ提示してくださいまた、その漢字の意味も含めて説明してください。"
                ],
                [
                    "role" => "user",
                    "content" => "価値観: {$value}, 情熱: {$passion}, 試練: {$trial}"
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
