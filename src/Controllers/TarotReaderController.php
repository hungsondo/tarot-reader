<?php

namespace Hungsondo\TarotReader\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hungsondo\TarotReader\TarotReader;

class TarotReaderController
{
    public function __invoke(TarotReader $reader) {
        $quote = $reader->justDoIt();

        return view('tarot-reader::index', compact('quote'));
    }
}