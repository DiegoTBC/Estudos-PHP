<?php

$agora = new DateTime();
var_dump($agora);

$outraData = DateTime::createFromFormat('d/m/Y', time());
var_dump($outraData);