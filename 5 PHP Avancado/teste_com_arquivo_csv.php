<?php

$file = fopen("teste.csv", "r") or die("Não foi pissivel abrir o arquivo!");
print_r(fgetcsv($file));
fclose($file);
//-----------------
$list = array (
    array("Peter", "Griffin" ,"Oslo", "Norway"),
    array("Glenn", "Quagmire", "Oslo", "Norway")
  );
  
$file2 = fopen("contacts.csv","w");
  
foreach ($list as $line) {
    fputcsv($file2, $line);
}
  
fclose($file2);
?>