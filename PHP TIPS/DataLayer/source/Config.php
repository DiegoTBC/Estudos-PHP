<?php

define("DATA_LAYER_CONFIG", [
    "driver" => "sqlite",
    "host" => __DIR__ . "/../database.sqlite",
    "port" => "",
    "dbname" => "",
    "username" => "",
    "passwd" => "",
    "options" => [
        //PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);