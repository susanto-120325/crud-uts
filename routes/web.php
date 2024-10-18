<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VapeArticleController;

Route::resource('vape_articles', VapeArticleController::class);
Route::get('/', function () {
    return view('home');
});

