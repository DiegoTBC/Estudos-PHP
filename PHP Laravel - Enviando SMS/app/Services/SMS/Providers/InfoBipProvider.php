<?php


namespace App\Services\SMS;

use Illuminate\Support\Facades\Http;

class InfoBipProvider
{
    public function send(string $celNumber, $msg)
    {
        $response = Http::withHeaders([
            'Authorization' => 'App e18398bfe914267d43988e7ff980c641-f0a32cd3-e58b-4c28-9f82-f013ed7e0fca'
        ])
            ->post('https://mp9wmj.api.infobip.com/sms/2/text/advanced', [
                'messages' => [
                    'from' => 'Teste Diego',
                    'destinations' => [
                        'to' => '55'. $celNumber
                    ],
                    'text' => $msg
                ]
            ]);

        return $response->status();
    }
}
