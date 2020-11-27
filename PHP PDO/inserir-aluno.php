<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::creatConnection();

$student = new Student(null, "Diego Torres", new DateTimeImmutable("2000-11-17"));
$student2 = new Student(null, "Laura', ''); DROP TABLE students; -- Crespi", new DateTimeImmutable("2002-03-08"));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student2->name());
$statement->bindValue(2, $student2->birthDate()->format('Y-m-d'));

if ($statement->execute()){
    echo "Aluno incluido";
}
