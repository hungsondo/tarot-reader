<?php

namespace Hungsondo\TarotReader\Controllers;

use Illuminate\Http\Request;
use Hungsondo\TarotReader\TarotReader;
use Illuminate\Support\Facades\Response;

class TarotReaderController
{
    public function index(TarotReader $reader) {
        return view('tarot-reader::index');
    }

    public function pickCards(TarotReader $reader) {
        $cards = $reader->pickCards();
        return Response::json($cards);
    }

    public function getResult(Request $request, TarotReader $reader) {
        $cards = data_get($request->all(),'cards');
        
        $result = $reader->getResult($cards);
        return Response::json([
            'result'=> $result,
        ]);
    }
}