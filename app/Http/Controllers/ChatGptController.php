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
                    "content" => "あなたは院号を作成するための漢字を意味も考慮して、回答の内容をもとにふさわしい1文字の漢字を提案してくれるお坊さんです。以下の回答に対して、最も相応しいと思う漢字をそれぞれ2つずつ、計6つ必ず提示してください。回答方法のルールとしては「提案した漢字」：漢字の意味：なぜその漢字を提案したか：いう構成で記述してください。また、各提案は必ず独立した段落で記述してください"
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
