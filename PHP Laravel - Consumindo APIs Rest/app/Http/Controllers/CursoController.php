<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CursoRepository;

class CursoController extends Controller
{
    /**
     * instancia do repositório usado para consumir a API
     */
    public CursoRepository $cursoRepository;

    /**
     * Injeta a instância do repositório na propriedade
     *
     * @param CursoRepository $cursoRepository
     */
    public function __construct(CursoRepository $cursoRepository)
    {
        $this->cursoRepository = $cursoRepository;
    }

    /**
     * lista os cursos cadastrados na api
     *
     * @return void
     */
    public function list()
    {
        $cursos = $this->cursoRepository->list();

        dd($cursos);
    }

    /**
     * Exibe um curso especifico usando a API
     *
     * @return void
     */
    public function show()
    {
        $curso = $this->cursoRepository->show('Xf6BSSuRxtl7zrgv');

        dd($curso);
    }

    /**
     * Cria um novo curso via API
     *
     * @return void
     */
    public function create()
    {
        $resposta = $this->cursoRepository->create([
            'nome' => 'PHP OO parte 2',
            'linguagem' => 'PHP'
        ]);

        if ($resposta) {
            return 'criado com sucesso';
        }

        return 'Erro ao criar';
    }

    /**
     * Atualiza um curso via API
     *
     * @return void
     */
    public function update()
    {
        $resposta = $this->cursoRepository->update('59aeX7V3JRiQzNBZ', [
            'nome' => 'PHP Orientado a Objetos',
            'linguagem' => 'PHP'
        ]);

        if ($resposta) {
            return 'atualizado com sucesso';
        }

        return 'Erro ao atualizar';
    }

    /**
     * Deleta um curso via API
     *
     * @return void
     */
    public function delete()
    {
        $resposta = $this->cursoRepository->delete('59aeX7V3JRiQzNBZ');

        if ($resposta) {
            return 'deletado com sucesso';
        }

        return 'Erro ao deletar';
    }
}
