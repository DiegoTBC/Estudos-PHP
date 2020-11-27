<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

/**
 * @var Aluno[] $alunoList
 */
$alunoList = $alunoRepository->findAll();

foreach ($alunoList as $aluno){
    $telefones = $aluno->getTelefones()->map(function (Telefone  $telefone){
        return $telefone->getNumero();
    })->toArray();
    echo $aluno->getNome() . "\n";
    echo "Telefones: " . implode(", ", $telefones) . "\n\n";
}

/**
 * @var Aluno $diego
 */
$diego = $alunoRepository->find(1);
echo "\n" . $diego->getNome() . "\n\n";

$laura = $alunoRepository->findOneBy([
    'nome' => 'Laura Crespi'
]);

echo $laura->getNome() . "\n\n";

$alunos = $alunoRepository->findBy(
    [],
    ['nome' => 'ASC'],
    2,
    2
);