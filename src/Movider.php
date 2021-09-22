<?php

namespace VVinners\Movider;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class Movider
{
    // Build your next great package.
    public function sendMessage(string $message, string $to, ?string $from = '')
    {
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

        if ($response->ok()) {
            if (Schema::hasTable('movider_log')) {
                $moviderLog = new MoviderLog;
                $moviderLog->from = $from;
                $moviderLog->to = $to;
                $moviderLog->content = $message;
                $moviderLog->save();
            }
        }

        return $response;
    }

    public function usage()
    {
        Carbon::now();
    }
}
