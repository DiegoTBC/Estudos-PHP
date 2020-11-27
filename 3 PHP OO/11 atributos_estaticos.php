<?php

//==================================================================================
//                                     ATRIBUTOS ESTÁTICOS
//As propriedades estáticas podem ser chamadas diretamente - sem criar uma instância de uma classe.
//As propriedades estáticas são declaradas com a palavra-chave estática:
//==================================================================================

class ClassName {
    public static $staticProp = "W3Schools";
}

ClassName::$staticProp;

class pi {
    public static $value = 3.14159;
  }
  
//Get static property
echo pi::$value;

//Uma classe pode ter propriedades estáticas e não estáticas.
//Uma propriedade estática pode ser acessada a partir de um método na mesma classe usando a palavra-chave self e dois pontos duplos (::)
class pi2{
    public static $value=3.14159;
    public function staticValue() {
      return self::$value;
    }
}
  
$pi = new pi2();
echo $pi->staticValue();

//Para chamar uma propriedade estática de uma classe filha, use a palavra-chave pai dentro da classe filha:
class pi3 {
    public static $value=3.14159;
  }
  
class x extends pi3 {
    public function xStatic() {
      return parent::$value;
    }
}
  
// Get value of static property directly via child class
echo x::$value;
  
// or get value of static property via xStatic() method
$x = new x();
echo $x->xStatic();

//Teste
class Teste{
  private static $contador = 0;
  public static function Contador(){
    self::$contador++;
  }
  public static function MostraContador(){
    return self::$contador;
  }
}

$a = new Teste();
Teste::Contador();
Teste::Contador();
Teste::Contador();
Teste::Contador();
Teste::Contador();
echo $a->MostraContador();

?>