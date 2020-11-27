<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderizadorDeHTML;
use Alura\Cursos\Infra\EntityManagerCreator;

class FormularioEdicao implements IControladorRequisicao
{
    use RenderizadorDeHTML;

    private \Doctrine\ORM\EntityManagerInterface $entityManager;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository|\Doctrine\Persistence\ObjectRepository
     */
    private $repositorioCursos;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioCursos = $this->entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (is_null($id) || $id === false) {
            header('Location: /listar-cursos');
            return;
        }

        $curso = $this->repositorioCursos->find($id);
        /*$titulo = "Alterar Curso " . $curso->getDescricao();*/

        echo $this->renderizaHTML('cursos/formulario.php', [
            'curso' => $curso,
            'titulo' => "Alterar Curso " . $curso->getDescricao()
        ]);
        /*require __DIR__ . "/../../view/cursos/formulario.php";*/
    }
}