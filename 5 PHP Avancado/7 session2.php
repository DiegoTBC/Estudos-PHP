<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<body>
    <?php
    echo "Meu nome é ".$_SESSION['name']." e tenho ".$_SESSION['idade']." anos de idade.  <br>";
    //visualizar todas as variaveis de sessao
    print_r($_SESSION);
    session_unset();
    session_destroy();

    ?>
</body>
</html>