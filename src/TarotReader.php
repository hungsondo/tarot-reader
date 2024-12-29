<?php

namespace Hungsondo\TarotReader;

use Illuminate\Support\Facades\Http;

class TarotReader {
    public function justDoIt() {
        $response = Http::withOptions(['verify' => false])->get('https://api.quotable.io/random');

        return $response['content'];
    }
}