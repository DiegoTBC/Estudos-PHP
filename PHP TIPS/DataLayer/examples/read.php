<?php

use Source\Models\User;

require '../vendor/autoload.php';


$conn = \CoffeeCode\DataLayer\Connect::getInstance();
$error = \CoffeeCode\DataLayer\Connect::getError();

if ($error) {
    echo $error->getMessage();
    die();
}

$user = new User();
$list = $user->find()->fetch(true);

/**
 * @var $userItem User
 */
foreach ($list as $userItem) {
    var_dump($userItem->data);
    var_dump($userItem->addresses());
}