<?php


namespace Alura\Doctrine\Repository;


use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno(bool $exibeCursos)
    {
        /*$em = $this->getEntityManager();
        $dql = "SELECT a, t, c FROM Alura\\Doctrine\\Entity\\Aluno a JOIN a.telefones t JOIN a.cursos c";
        $query = $em->createQuery($dql);

        return $query->getResult();*/

        $builder = $this->createQueryBuilder('a')
            ->join('a.telefones', 't')
            ->join('a.cursos', 'c')
            ->addSelect('t')
            ->addSelect('c');

        if ($exibeCursos) {
            $builder->addSelect('c')
                ->join('a.cursos', 'c');
        }

        $query = $builder->getQuery();

        return $query->getResult();

    }
}
