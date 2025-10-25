<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextToSpeechController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/text-to-speech', [TextToSpeechController::class, 'index']);
Route::post('/text-to-speech/generate', [TextToSpeechController::class, 'generate' ])->name('text-to-speech.generate');


