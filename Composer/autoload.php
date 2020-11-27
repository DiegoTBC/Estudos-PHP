<?php

spl_autoload_register(function (string $nomeDaClasse) {
    $caminhoDoArquivo = str_replace("Diego\\Funcionarios", "src", $nomeDaClasse);
    $caminhoDoArquivo = str_replace("\\", DIRECTORY_SEPARATOR, $caminhoDoArquivo);
    $caminhoDoArquivo .= ".php";

    if (file_exists($caminhoDoArquivo)) {
        require_once $caminhoDoArquivo;
    }
});
