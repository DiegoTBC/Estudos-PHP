<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GithubService 
{
    /**
     * Busca os repositórios usando a API do Github
     *
     * @return void
     */
    public function buscarRepositorios()
    {
        $response = Http::get('https://api.github.com/search/repositories?q=EltonFonseca');

        $repositorios = [];
        if ($response->successful()) {
            $repositorios = $response->json()['items'];
        }

        return $repositorios;
    }
}