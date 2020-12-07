<?php


namespace App\Services;

use App\Mail\NovaSerie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviarEmail
{

    public static function novaSerie(Request $request)
    {
        $email = new NovaSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $email->subject('Nova Série Adicionada');

        Mail::to($request->user())->send($email);
    }

    public static function novaSerieAll(Request $request)
    {
        $users = User::all();
        foreach ($users as $user)
        {
            $email = new NovaSerie(
                $request->nome,
                $request->qtd_temporadas,
                $request->ep_por_temporada
            );

            $email->subject('Nova Série Adicionada');

            Mail::to($user)->send($email);
            sleep(5);
        }
    }

}
