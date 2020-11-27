<?php


//========================Interfaces========================
interface Animal {
    public function makeSound();
}
  
  // Class definitions
class Cat implements Animal {
    public function makeSound() {
      echo " Meow ";
    }
}
  
class Dog implements Animal {
    public function makeSound() {
      echo " Bark ";
    }
}
  
class Mouse implements Animal {
    public function makeSound() {
      echo " Squeak ";
    }
}

$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);
  
// Tell the animals to make a sound
foreach($animals as $animal) {
    $animal->makeSound();
}

//=======================Classes Abstratas===========================
abstract class Animal2{
    abstract protected function makeSound();
}

class Gato extends Animal2{
    public function makeSound(){
        echo "Meow";
    }
}

class Cachorro extends Animal2{
    public function makeSound(){
        echo "Auau";
    }
}

class Rato extends Animal2{
    public function makeSound(){
        echo " Squeak";
    }
}

$gato = new Gato();
$cachorro = new Cachorro();
$rato = new Rato();
$animais = [$gato, $cachorro, $rato];
foreach($animais as $animal){
    $animal->makeSound();
}

?>