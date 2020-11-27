<?php

//================================================================================================================
//                                               CONSTANTES DE CLASSES
//As constantes não podem ser alteradas depois de declaradas. 
//As constantes de classe podem ser úteis se você precisar definir alguns dados constantes dentro de uma classe. 
//Uma constante de classe é declarada dentro de uma classe com a palavra-chave const.
//As constantes de classe diferenciam maiúsculas de minúsculas. No entanto, é recomendável nomear as constantes em todas as letras maiúsculas.
//================================================================================================================

//Podemos acessar uma constante de fora da classe usando o nome da classe seguido pelo operador de resolução de escopo (::) 
//seguido pelo nome da constante, como aqui:

class Goodbye {
    const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com! <br>";
}
  
echo Goodbye::LEAVING_MESSAGE;

//Ou podemos acessar uma constante de dentro da classe usando a palavra-chave self seguida pelo operador de resolução de escopo (::) 
//seguido pelo nome da constante, como aqui:

class Goodbye2 {
    const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
    public function byebye() {
      echo self::LEAVING_MESSAGE;
    }
  }
  
  $goodbye = new Goodbye2();
  $goodbye->byebye();

?>