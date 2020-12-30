<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use App\User;
use bar\baz\source_with_namespace;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EnviarEmailNovaSerie implements  ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        $users = User::all();
        foreach ($users as $indice => $user)
        {
            $multiplicador = $indice + 1;
            $email = new \App\Mail\NovaSerie(
                $event->nome,
                $event->qtdTemporadas,
                $event->qtdEpisodios
            );

            $email->subject('Nova Série Adicionada');
            $quando = now()->addSeconds($multiplicador * 10);
            Mail::to($user)->later($quando, $email);
        }
    }
}
