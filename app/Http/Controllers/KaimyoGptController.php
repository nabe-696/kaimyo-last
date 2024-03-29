<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class KaimyoGptController extends Controller
{
    public function index(Request $request)
    {
        
        return view('kaimyo');
    }

    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'influentialPerson' => 'required',
            'proudestMoment' => 'required',
            'relianceDuringHardship' => 'required',
        ]);

        // 入力値の取得
        $influentialPerson = $request->input('influentialPerson');
        $proudestMoment = $request->input('proudestMoment');
        $relianceDuringHardship = $request->input('relianceDuringHardship');

        // 漢字提案ロジック
        $kanji_suggestions = $this->generateKanjiSuggestions($influentialPerson, $proudestMoment, $relianceDuringHardship);

        // kaimyoビューにデータを渡す
        return view('kaimyo', compact('influentialPerson', 'proudestMoment', 'relianceDuringHardship', 'kanji_suggestions'));
    }

    protected function generateKanjiSuggestions($influentialPerson, $proudestMoment, $relianceDuringHardship)
    {
        $api_key = env('CHAT_GPT_KEY');

        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => "あなたは戒名を作成するための漢字を意味も考慮して、ユーザーにふさわしい漢字を提案してくれるお坊さんです。以下の回答に基づいて、おすすめの漢字1文字の候補をそれぞれの回答に対して、2つずつ、計6つ提示してくださいまた、その漢字の意味も含めて説明してください。"
                ],
                [
                    "role" => "user",
                    "content" => "影響を受けた人物: {$influentialPerson}, 誇りに思う瞬間: {$proudestMoment}, 困難時の頼りにしたもの: {$relianceDuringHardship}"
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
