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
        foreach ($users as $indice => $user)
        {
            $multiplicador = $indice + 1;
            $email = new NovaSerie(
                $request->nome,
                $request->qtd_temporadas,
                $request->ep_por_temporada
            );

            $email->subject('Nova Série Adicionada');
            $quando = now()->addSeconds($multiplicador * 10);
            Mail::to($user)->later($quando, $email);
        }
    }

}
