<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GithubService;

class GithubController extends Controller
{
    /**
     * Busca os repositórios usando a API do Github
     *
     * @param GithubService $github
     * @return void
     */
    public function buscar(GithubService $github)
    {
        $repositorios = $github->buscarRepositorios();

        return view('github.buscar', \compact('repositorios'));
    }
}
