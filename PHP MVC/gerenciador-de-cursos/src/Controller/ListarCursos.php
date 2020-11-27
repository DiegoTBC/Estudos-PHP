<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHTML;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListarCursos implements IControladorRequisicao
{
    use RenderizadorDeHTML;

    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $cursos = $this->repositorioDeCursos->findAll();
        $titulo = "Listar Cursos";
        echo $this->renderizaHTML('/cursos/listar-cursos.php', ['cursos' => $cursos, 'titulo' => "Listar Cursos"]);
        /*require __DIR__ . "/../../view/cursos/listar-cursos.php";*/
    }
}