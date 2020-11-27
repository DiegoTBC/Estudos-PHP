<?php
    session_start();

?>

<!DOCTYPE html>
<html>
<body>
    <?php
    //set session variables
    $_SESSION['name'] = "Diego";
    $_SESSION['idade'] = 20;
    echo "Session variables are set."
    ?>
</body>
</html>