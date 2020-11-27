<?php

$nameErr = $emailErr = $genderErr = "";
$name = $email = $gender = $comment = $website = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Name é obrigatório";
    } else {
        $name = test_input($_POST["name"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Somente letras e espaços são permitidos";
        }
    }
    
    if (empty($_POST["email"])){
        $emailErr = "Email é obrigatório";
    } else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email inválido";
        }
    }

    if(empty($_POST["website"])){
        $website = "";
    } else {
        $website = test_input($_POST["website"]);

        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "URL Inválido";
          }
      
    }
    
    if(empty($_POST["comment"])){
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }
    
    if(empty($_POST["gender"])){
        $genderErr = "Gênero é obrigatório";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



?>