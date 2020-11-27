<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$conn = ConnectionCreator::creatConnection();
$studentRepository = new PdoStudentRepository($conn);

try {
    $conn->beginTransaction();
    $aStudent = new Student(null, "Ana Farias", new DateTimeImmutable('1980-08-25'));

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(null, "Carlos Silva", new DateTimeImmutable('1980-05-10'));

    $studentRepository->save($anotherStudent);

    $conn->commit();
} catch (PDOException $e) {
    echo $e->getMessage();
    $e->errorInfo[2];
    $conn->rollBack();
}


//finaliza a transação e executa os comandos
//$conn->commit();

//volta para o estado anterior (checkpoint)
//desfaz todas as alterações feitas na transação
//$conn->rollBack();