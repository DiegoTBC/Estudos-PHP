<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class CursoRepository 
{
    /**
     * lista os cursos cadastrados na api
     *
     * @return void
     */
    public function list()
    {
        $response = Http::get('http://172.24.192.1:3002/api/treinaweb/curso');

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    /**
     * Exibe um curso especifico usando a API
     *
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        $response = Http::get("http://172.24.192.1:3002/api/treinaweb/curso?id={$id}");

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }

    /**
     * Cria um novo curso via API
     *
     * @param array $dados
     * @return void
     */
    public function create(array $dados)
    {
        $response = Http::post('http://172.24.192.1:3002/api/treinaweb/curso', $dados);

        return $response->successful();
    }

    /**
     * Atualiza um curso via API
     *
     * @param string $id
     * @param array $dados
     * @return void
     */
    public function update(string $id, array $dados)
    {
        $response = Http::put("http://172.24.192.1:3002/api/treinaweb/curso?id={$id}", $dados);

        return $response->successful();
    }

    /**
     * Deleta um curso via API
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id)
    {
        $response = Http::delete("http://172.24.192.1:3002/api/treinaweb/curso?id={$id}");

        return $response->successful();
    }
}