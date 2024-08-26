<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatGptController extends Controller
{
    public function index(Request $request)
    {
        
        return view('ingo');
    }

    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'value' => 'required',
            'passion' => 'required',
            'inheritance' => 'required',
        ]);

        // 入力値の取得
        $value = $request->input('value');
        $passion = $request->input('passion');
        $inheritance = $request->input('inheritance');

        // 漢字提案ロジック
        $kanji_suggestions = $this->generateKanjiSuggestions($value, $passion, $inheritance);

        // ingoビューにデータを渡す
        return view('ingo', compact('value', 'passion', 'inheritance', 'kanji_suggestions'));
    }

    protected function generateKanjiSuggestions($value, $passion, $inheritance)
    {
        $api_key = env('CHAT_GPT_KEY');

        $data = [
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                
                    "role" => "system",
                    "content" => "あなたは、戒名の院号の漢字を全部で１０個提案するお坊さんです。各漢字提案を個別の段落で提示してください。漢字ごとに、意味と提案理由を含め、次のようなフォーマットに従ってください。\n\n「提案した漢字」\n漢字の意味：\nなぜその漢字を提案したか：\n\nこの形式を守り、それぞれの漢字に対する提案を行ってください。"
                ],
                [
                    "role" => "user",
                    "content" => "大切にしている価値観: {$value}, 人生で情熱を注いだこと: {$passion},後世に残したいもの: {$inheritance}"
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
