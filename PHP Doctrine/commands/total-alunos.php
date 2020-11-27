<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$dql = "SELECT COUNT(a) FROM Alura\\Doctrine\\Entity\\Aluno a";
$totalAlunos = $entityManager->createQuery($dql)->getSingleScalarResult();

echo "Total de alunos: " . $totalAlunos;