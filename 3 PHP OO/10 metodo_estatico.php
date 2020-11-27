<?php

//==================================================================================
//                                     METODOS ESTÁTICOS
//Os métodos estáticos podem ser chamados diretamente - sem criar uma instância de uma classe.
//Os métodos estáticos são declarados com a palavra-chave static:
//==================================================================================

class ClassName {
    public static function staticMethod() {
      echo "Hello World!";
    }
}

//Para acessar um método estático, use o nome da classe, dois pontos duplos (::) e o nome do método:
ClassName::staticMethod();

class greeting {
    public static function welcome() {
      echo "Hello World!";
    }
}

greeting::welcome();

//Exemplo Explicado
//Aqui, declaramos um método estático: welcome(). Em seguida, chamamos o método estático usando o nome da classe,
//dois pontos duplos (::) e o nome do método (sem criar uma classe primeiro).

//Mais sobre métodos estáticos
//Uma classe pode ter métodos estáticos e não estáticos.
//Um método estático pode ser acessado de um método na mesma classe usando a palavra-chave self e dois pontos duplos (::)

class greeting2 {
    public static function welcome() {
      echo "Hello World!";
    }
  
    public function __construct() {
      self::welcome();
    }
}
  
new greeting2();

//Os métodos estáticos também podem ser chamados de métodos em outras classes. Para fazer isso, o método estático deve ser público:
class greeting3 {
  public static function welcome() {
    echo "Hello World!";
  }
}
  
class SomeOtherClass {
  public function message() {
    greeting3::welcome();
  }
}

//Para chamar um método estático de uma classe filha, use a palavra-chave parent dentro da classe filha.
//Aqui, o método estático pode ser público ou protegido.
class domain {
    protected static function getWebsiteName() {
      return "W3Schools.com";
    }
  }
  
class domainW3 extends domain {
    public $websiteName;
    public function __construct() {
      $this->websiteName = parent::getWebsiteName();
    }
}
  
$domainW3 = new domainW3;
echo $domainW3->websiteName;

?>