<?php


namespace Alura\Cursos\Helper;


trait RenderizadorDeHTML
{
    public function renderizaHTML(string $caminho, array $dados): string
    {
        //faz as chaves da array virarem variaveis isoladas
        extract($dados);
        ob_start();
        require __DIR__ . "/../../view/" . $caminho;
        $html = ob_get_clean();

        return $html;
    }
}