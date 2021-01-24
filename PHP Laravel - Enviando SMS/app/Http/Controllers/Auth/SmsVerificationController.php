<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SMS;


class SmsVerificationController extends Controller
{
    public function send(string $celNumber, SMS\SmsServiceInterface $smsService)
    {
        $code = mt_rand(1000, 9999);
        session(['code' => $code]);

        $response = $smsService->send(
            $celNumber,
            "Seu código de verificacao e: $code");

        if ($response === 200) {
            return 'enviado';
        }

        return response('não-enviado', $response);
    }
}
