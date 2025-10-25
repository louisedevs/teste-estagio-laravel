<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TextToSpeechController extends Controller
{
    public function index()
    {
        return view('text-to-speech');
    }

    public function generate(Request $request)
{
    $texto = $request->input('texto');
    $apiKey = env('VOICERSS_API_KEY');
    $url = 'https://api.voicerss.org/?key=' . $apiKey . '&hl=pt-br&src=' . urlencode($texto);
    
    // Desabilitei verificação SSL pois o audio não estava sendo gerado.
    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
        ]
    ]);
    
    $audioContent = file_get_contents($url, false, $context);
    
    return response($audioContent)->header('Content-Type', 'audio/mpeg');
}
}