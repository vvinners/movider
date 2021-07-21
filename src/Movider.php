<?php

namespace VVinners\Movider;

use Illuminate\Support\Facades\Http;

class Movider
{
    // Build your next great package.
    public function sendMessage(string $message, string $to, ?string $from = '') {
        $data = array(
            'api_key' => config('movider.moviderApiKey'),
            'api_secret' => config('movider.moviderApiSecret'),
            'text' => $message,
            'to' => $to,
            'from' => $from
        );

        $response = Http::asForm()->withHeaders([
            'Content-Type' => 'application/x-www-form-urlencoded',
            'cache-control' => 'no-cache'
        ])->post('https://api.movider.co/v1/sms', $data);

        return $response;
    }
}
