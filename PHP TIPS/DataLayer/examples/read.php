<?php

require '../vendor/autoload.php';

/*
$conn = \CoffeeCode\DataLayer\Connect::getInstance();
$error = \CoffeeCode\DataLayer\Connect::getError();

if ($error) {
    echo $error->getMessage();
    die();
}

var_dump(true);
*/

$user = new \Source\Models\User();
$list = $user->find()->fetch(true);

/**
 * @var $userItem \Source\Models\User
 */
foreach ($list as $userItem) {
    var_dump($userItem->data);
    var_dump($userItem->addresses());
}