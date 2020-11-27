<?php

//================================================================================================================
//                                               CLASSES ABSTRATAS
//Classes e métodos abstratos ocorrem quando a classe pai tem um método nomeado, mas precisa de suas classes filhas para preencher as tarefas.
//Uma classe abstrata é uma classe que contém pelo menos um método abstrato. Um método abstrato é um método declarado, mas não implementado no código.
//Uma classe ou método abstrato é definido com a palavra-chave abstract:
//================================================================================================================

abstract class ParentClass {
    abstract public function someMethod1();
    abstract public function someMethod2($name, $color);
    abstract public function someMethod3() : string;
}

//Ao herdar de uma classe abstrata, o método da classe filha deve ser definido com o mesmo nome e o mesmo ou um modificador de acesso menos restrito.
//Portanto, se o método abstrato é definido como protegido, o método da classe filha deve ser definido como protegido ou público, mas não privado.
//Além disso, o tipo e o número de argumentos necessários devem ser os mesmos. No entanto, as classes filhas também podem ter argumentos opcionais.
//Portanto, quando uma classe filha é herdada de uma classe abstrata, temos as seguintes regras:
// * O método da classe filha deve ser definido com o mesmo nome e declara novamente o método abstrato pai
// * O método da classe filha deve ser definido com o mesmo ou um modificador de acesso menos restrito
// * O número de argumentos necessários deve ser o mesmo. No entanto, a classe filha pode ter argumentos opcionais além

//======================EXEMPLO================================
//Classe pai
abstract class Car {
    public $name;
    public function __construct($name) {
      $this->name = $name;
    }
    abstract public function intro() : string;
}
  
//Classes filhas
  class Audi extends Car {
    public function intro() : string {
      return "Choose German quality! I'm an $this->name!";
    }
}
  
class Volvo extends Car {
    public function intro() : string {
      return "Proud to be Swedish! I'm a $this->name!";
    }
}
  
class Citroen extends Car {
    public function intro() : string {
      return "French extravagance! I'm a $this->name!";
    }
}
  
//Cria objetos a partir das classes filhas
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";
  
$volvo = new volvo("Volvo");
echo $volvo->intro();
echo "<br>";
  
$citroen = new citroen("Citroen");
echo $citroen->intro();

//==============EXPLICAÇÃO DO EXEMPLO==========================
//As classes Audi, Volvo e Citroen são herdadas da classe Car. 
//Isso significa que as classes Audi, Volvo e Citroen podem usar a propriedade public $name, bem como o método public __construct () da classe Car por causa da herança.
//Mas, intro () é um método abstrato que deve ser definido em todas as classes filhas e elas devem retornar uma string.


//===============================================================
//Vejamos outro EXEMPLO em que o método abstrato tem um argumento:
abstract class ParentClass2 {
    // Abstract method with an argument
    abstract protected function prefixName($name);
}
  
class ChildClass extends ParentClass2{
    public function prefixName($name) {
      if ($name == "John Doe") {
        $prefix = "Mr.";
      } elseif ($name == "Jane Doe") {
        $prefix = "Mrs.";
      } else {
        $prefix = "";
      }
      return "{$prefix} {$name}";
    }
}
  
$class = new ChildClass;
echo "<br>";
echo $class->prefixName("John Doe");
echo "<br>";
echo $class->prefixName("Jane Doe");


//Vejamos outro EXEMPLO em que o método abstrato tem um argumento e a classe filha tem dois argumentos opcionais que não são definidos no método abstrato do pai:
abstract class ParentClass3 {
    // Abstract method with an argument
    abstract protected function prefixName($name);
}
  
class ChildClass2 extends ParentClass3 {
    // The child class may define optional arguments that are not in the parent's abstract method
    public function prefixName($name, $separator = ".", $greet = "Dear") {
      if ($name == "John Doe") {
        $prefix = "Mr";
      } elseif ($name == "Jane Doe") {
        $prefix = "Mrs";
      } else {
        $prefix = "";
      }
      return "{$greet} {$prefix}{$separator} {$name}";
    }
}
  
$class2 = new ChildClass2;
echo "<br>";
echo $class2->prefixName("John Doe");
echo "<br>";
echo $class2->prefixName("Jane Doe");

?>