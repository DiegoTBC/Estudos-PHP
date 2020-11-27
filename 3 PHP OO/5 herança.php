<?php

//================================================================================================================
//Herança em OOP = quando uma classe deriva de outra classe. 
//A classe filha herdará todas as propriedades e métodos públicos e protegidos da classe pai. Além disso, ele pode ter suas próprias propriedades e métodos.
//Uma classe herdada é definida usando a palavra-chave extends.
//================================================================================================================


//================================================================================================================
//                                    Herança e o modificador de acesso protected
//================================================================================================================
class Fruit {
    public $name;
    public $color;

    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    protected function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}. <br><br>";
    }
}
  
class Strawberry extends Fruit {
    public function message() {
        echo "Am I a fruit or a berry? <br>";
        //Chama o metodo protegido dentro da classe derivada
        $this->intro();
    }
}

$strawberry = new Strawberry("Strawberry", "red");  // OK. __construct() is public
$strawberry->message(); // OK. message() is public

//================================================================================================================
//                                         SUBSTITUINDO METODOS HERDADOS
//Os métodos herdados podem ser substituídos redefinindo os métodos (use o mesmo nome) na classe filha.
//================================================================================================================

class Fruta {
    public $name;
    public $color;
    public function __construct($name, $color) {
      $this->name = $name;
      $this->color = $color;
    }
    public function intro() {
      echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}
  
class Morango extends Fruta {
    public $weight;
    public function __construct($name, $color, $weight) {
      $this->name = $name;
      $this->color = $color;
      $this->weight = $weight;
    }
    public function intro() {
      echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram.";
    }
}
  
$morango = new Morango("Morango", "red", 50);
$morango->intro();

//================================================================================================================
//                                               A PALAVRA CHAVE FINAL
//A palavra-chave final pode ser usada para impedir a herança de classe ou para evitar a substituição de método.
//================================================================================================================

final class Car {
    // não deixa a classe ser herdada
  }
  
/*class Esportivo extends Car {
    // dara erro
}*/

class Carro {
    final public function intro() {
      // nao deixa o metodo ser reescrito
    }
}
  
class Trucker extends Carro {
    // dara erro
    /*public function intro() {
    }*/
}

?>