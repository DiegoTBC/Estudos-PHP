<?php

$diretorioAtual = dir('.');

echo $diretorioAtual->path;

while ($arquivo = $diretorioAtual->read()) {
    echo $arquivo . PHP_EOL;
}