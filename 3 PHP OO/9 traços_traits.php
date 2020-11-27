<?php 

//==================================================================================
//                                     TRAITS
//O PHP suporta apenas herança única: uma classe filha pode herdar apenas de um único pai.
//Então, e se uma classe precisar herdar vários comportamentos? Os traços OOP resolvem esse problema.
//Traits são usados ​​para declarar métodos que podem ser usados ​​em várias classes.
//As características podem ter métodos e métodos abstratos que podem ser usados ​​em várias classes e os
//métodos podem ter qualquer modificador de acesso (público, privado ou protegido).
//Traits são declarados com a palavra-chave trait:
//==================================================================================

trait TraitName {
    // some code...
}

//Para usar um trait em uma classe, use a palavra-chave use:

class MyClass {
    use TraitName;
}

//Vejamos um exemplo:

trait message1 {
    public function msg1() {
        echo "OOP is fun! ";
    }
}
    
class Welcome {
    use message1;
}
    
$obj = new Welcome();
$obj->msg1();

//Exemplo Explicado
//Aqui, declaramos um traço: mensagem1. Em seguida, criamos uma classe: Bem-vindo. A classe usa a característica,
//e todos os métodos da característica estarão disponíveis na classe.
//Se outras classes precisarem usar a função msg1 (), simplesmente use o traço message1 nessas classes. 
//Isso reduz a duplicação de código, porque não há necessidade de declarar novamente o mesmo método continuamente.

//Usando vários traços
trait message2 {
    public function msg1() {
      echo "OOP is fun! ";
    }
}
  
trait message3 {
    public function msg2() {
      echo "OOP reduces code duplication!";
    }
}
  
class Welcome2 {
    use message1;
}
  
class Welcome3 {
    use message2, message3;
}
  
$obj2 = new Welcome2();
$obj2->msg1();
echo "<br>";
  
$obj3 = new Welcome3();
$obj3->msg1();
$obj3->msg2();

//Exemplo Explicado
//Aqui, declaramos duas características: mensagem1 e mensagem2. Em seguida, criamos duas classes: Welcome e Welcome2. 
//A primeira classe (Bem-vindo) usa o traço mensagem1, e a segunda classe (Welcome2) usa os traços message1 e message2 (vários traços são separados por vírgula).

?>