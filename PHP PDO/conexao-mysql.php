<?php
$servername = "localhost";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername;dbname=faculdade_manha", $username);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = "INSERT INTO aluno (codigo, nome, idade) VALUES (6, 'Diego Torres', 19);";
    $sql = "SELECT nome, idade FROM aluno WHERE idade >= 19 ORDER BY idade;";
    $consulta = $conn->query($sql);

    echo "<table><td>Nome</td><td>Idade</td>";

    while ($lista = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $lista['nome'] . "</td>";
        echo "<td>" . $lista['idade'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    $lista = $consulta->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

