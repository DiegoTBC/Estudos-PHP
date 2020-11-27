<?php

$str = "<h1>Hello World!</h1>";
//vai limpar todas as tags html
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo $newstr;

$int = 100;

if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false){
    echo "Integer is valid";
}else {
    echo "Integer is not valid";
}

$ip = "127.0.0.1";

if (!!filter_var($ip, FILTER_VALIDATE_IP)) {
  echo("<br>$ip is a valid IP address");
} else {
  echo("<br>$ip is not a valid IP address");
}

$email = "torressdiiego@gmail.com";
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if(!!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "<br>Email válido";
} else {
    echo "<br>Email inválido";
}

$url = "https://www.google.com";
$url = filter_var($url, FILTER_SANITIZE_URL);

if (!!filter_var($url, FILTER_VALIDATE_URL)){
    echo "<br> URL válido";
} else {
    echo "<br> URL inválido";
}

?>