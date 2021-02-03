<?php

require '../vendor/autoload.php';
use Source\Models\User;

$user = new User();
$user->first_name = "Diego";
$user->last_name = "Torres";
$user->save();

$addr = new \Source\Models\Address();
$addr->add($user, "Nome da rua", "22");
$addr->save();