<?php

use Hungsondo\TarotReader\Controllers\TarotReaderController;
use Illuminate\Support\Facades\Route;

Route::get('tarot-reader', TarotReaderController::class);
