<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GithubController extends Controller
{
    public function buscar()
    {
        $response = Http::get('https://api.github.com/search/repositories?q=DiegoTBC');
        dd($response->body());
    }
}
