<?php 

$cookie_name = "user";
$cookie_value = "Diego Torres";
//criar o cookie: setcookie(name, value, expire, path, domain, secure, httponly);
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
//O exemplo a seguir cria um cookie denominado "usuário" com o valor "John Doe".
//O cookie irá expirar após 30 dias (86400 * 30). O "/" significa que o cookie está
//disponível em todo o site (caso contrário, selecione o diretório de sua preferência).

?>

<!DOCTYPE html>
<html>
<body>
    <?php
    if(!isset($_COOKIE[$cookie_name])){
        echo "Cookie named $cookie_name is not set!";
    } else {
        echo "Cookie $cookie_name is set! <br>";
        echo "Value is: ". $_COOKIE[$cookie_name]. "<br>";
    }

    if(count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
      } else {
        echo "Cookies are disabled.";
      }

    ?>
</body>
</html>