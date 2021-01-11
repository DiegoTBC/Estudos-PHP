<?php

//echo file_get_contents('zip://arquivos.zip#lista-cursos.txt');

//lendo zip com senha
$contexto = stream_context_create([
   'zip' => [
       'password' => '17062018'
   ]
]);
echo file_get_contents('zip://arquivoZipado.zip#cursos-php.txt', false, $contexto);