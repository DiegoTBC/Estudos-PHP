<?php

use Source\Models\User;

require '../vendor/autoload.php';

$user = (new User())->findById(1);
if ($user){
    $user->destroy();
} else {
    var_dump($user);
}