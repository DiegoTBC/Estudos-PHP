<?php

use Source\Models\User;

require '../vendor/autoload.php';

$user = (new User())->findById(1);
$user->first_name = "Diego";
$user->last_name = "Torres Barbosa";
$user->save();
