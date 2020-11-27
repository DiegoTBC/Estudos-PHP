<?php 

function my_callback($item){
    return strlen($item);
}

$strings = ["apple", "orange", "banana", "coconut"];
$lenghts = array_map("my_callback", $strings);
print_r($lenghts);

$lengths = array_map( function($item) { return strlen($item); } , $strings);
print_r($lengths);

?>