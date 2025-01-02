<?php

namespace Hungsondo\TarotReader;

use Illuminate\Support\Facades\Http;

class TarotReader {
    protected $cards;

    public function __construct()
    {
        $filePath = __DIR__ . '/../data/cards.json';
        $jsonData = file_get_contents($filePath);
        $this->cards = json_decode($jsonData, true);
    }

    public function pickCards() 
    {
        $pickedCards = array_rand($this->cards, 3);

        return [
            $pickedCards[0] => $this->cards[$pickedCards[0]],
            $pickedCards[1] => $this->cards[$pickedCards[1]],
            $pickedCards[2] => $this->cards[$pickedCards[2]],
        ];
    }

    public function getResult($pickedCards): string
    {
        $cardOne = $this->cards[$pickedCards[0]]['name'];
        $cardTwo = $this->cards[$pickedCards[1]]['name'];
        $cardThree = $this->cards[$pickedCards[2]]['name'];

        $apiKey = 'AIzaSyCs9p6XNT7QWrrX5KDob_tGl7LHcPUYHls';

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$apiKey";
        $data = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => "Tell me the combine result of 3 tarot cards: $cardOne, $cardTwo, $cardThree . Answer in Vietnamese."]
                    ]
                ]
            ]
        ];

        $response = Http::withOptions(['verify' => false])->post($url, $data);

        if ($response->failed()) {
            throw new \Exception("Failed to connect to Gemini API");
        }

        $responseBody = json_decode($response->getBody(), true);
        $result = data_get($responseBody,"candidates.0.content.parts.0.text", 'No result');

        return $result;
    }
}