<?php

//==================================================================================
//                                     INTERFACES
//As interfaces permitem que você especifique quais métodos uma classe deve implementar.
//As interfaces facilitam o uso de uma variedade de classes diferentes da mesma maneira. 
//Quando uma ou mais classes usam a mesma interface, isso é conhecido como "polimorfismo".
//==================================================================================

//As interfaces são declaradas com a palavra-chave interface:
interface InterfaceName {
    public function someMethod1();
    public function someMethod2($name, $color);
    public function someMethod3() : string;
}

//======================INTERFACES vs CLASSES ABSTRATAS=============================
//Interface são semelhantes às classes abstratas. A diferença entre interfaces e classes abstratas são:
// * As interfaces não podem ter propriedades, enquanto as classes abstratas podem
// * Todos os métodos da interface devem ser públicos enquanto os métodos da classe abstrata também podem ser privados ou protegidos
// * Todos os métodos em uma interface são abstratos, então eles não podem ser implementados no código e a palavra-chave abstrata não é necessária
// * As classes podem implementar uma interface enquanto herdam de outra classe ao mesmo tempo

//=========================USANDO INTERFACES===============================
//Para implementar uma interface, uma classe deve usar a palavra-chave implements.
//Uma classe que implementa uma interface deve implementar todos os métodos da interface.

interface Animal2 {
    public function makeSound();
}
  
class Cat2 implements Animal2 {
    public function makeSound() {
      echo "Meow";
    }
}
  
$animal = new Cat2();
$animal->makeSound();

//A partir do exemplo acima, digamos que gostaríamos de escrever um software que gerencia um grupo de animais. 
//Existem ações que todos os animais podem realizar, mas cada animal o faz à sua maneira.
//Usando interfaces, podemos escrever algum código que pode funcionar para todos os animais, mesmo que cada animal se comporte de maneira diferente

// Interface definition
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
  
// Create a list of animals
$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);
  
// Tell the animals to make a sound
foreach($animals as $animal) {
    $animal->makeSound();
}

//=============EXPLICAÇÃO DO EXEMPLO=================
//Cat, Dog e Mouse são classes que implementam a interface Animal, o que significa que todas elas são capazes de fazer um som usando o método makeSound ().
//Por causa disso, podemos percorrer todos os animais e dizer-lhes que façam um som, mesmo que não saibamos que tipo de animal cada um é.
//Como a interface não informa às classes como implementar o método, cada animal pode emitir um som à sua maneira.


?>