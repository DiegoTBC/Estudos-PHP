<?php


namespace App\Services\SMS;

use Illuminate\Support\Facades\Http;

class InfoBipProvider implements SmsServiceInterface
{
    /**
     * @var string
     */
    private $token;
    private $url;

    public function __construct(string $token, $url)
    {
        $this->token = $token;
        $this->url = $url;
    }

    public function send(string $celNumber, string $msg): int
    {
        $response = Http::withHeaders([
            'Authorization' => "App {$this->token}"
        ])
            ->post("{$this->url}/text/advanced", [
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
