<?php

//==================================================================================
//                                     ITERABLES
//Um iterável é qualquer valor que pode ser executado em um loop foreach ().
//O pseudo-tipo iterável foi introduzido no PHP 7.1 e pode ser usado como um tipo de dados para argumentos de função e valores de retorno de função.
//==================================================================================

//A palavra-chave iterável pode ser usada como um tipo de dados de um argumento de função ou como o tipo de retorno de uma função:
function printIterable(iterable $myIterable) {
    foreach($myIterable as $item) {
      echo $item;
    }
}
  
$arr = ["a", "b", "c"];
printIterable($arr);

//Retorne um iterável:
function getIterable():iterable {
    return ["a", "b", "c"];
}
  
$myIterable = getIterable();
foreach($myIterable as $item) {
    echo $item;
}

//Criando de iteráveis
//ARRAYS = Todos os arrays são iteráveis, portanto, qualquer array pode ser usado como argumento de uma função que requer um iterável.
//ITERATORS = Qualquer objeto que implemente a interface Iterator pode ser usado como um argumento de uma função que requer um iterável.
//Um iterador contém uma lista de itens e fornece métodos para percorrê-los. Ele mantém um ponteiro para um dos elementos da lista.
//Cada item da lista deve ter uma chave que pode ser usada para localizar o item.
//Um iterador deve ter estes métodos:
// * current() - Retorna o elemento para o qual o ponteiro está apontando no momento. Pode ser qualquer tipo de dado.
// * key() Retorna a chave associada ao elemento atual na lista. Só pode ser um número inteiro, flutuante, booleano ou string.
// * next() Move o ponteiro para o próximo elemento na lista
// * rewind() Move o ponteiro para o primeiro elemento da lista
// * valid () Se o ponteiro interno não estiver apontando para nenhum elemento (por exemplo, se next () foi chamado no final da lista),
//   deve retornar falso. Retorna verdadeiro em qualquer outro caso

//Implemente a interface Iterator e use-a como um iterável:
// Create an Iterator
class MyIterator implements Iterator {
    private $items = [];
    private $pointer = 0;
  
    public function __construct($items) {
      // array_values() makes sure that the keys are numbers
      $this->items = array_values($items);
    }
  
    public function current() {
      return $this->items[$this->pointer];
    }
  
    public function key() {
      return $this->pointer;
    }
  
    public function next() {
      $this->pointer++;
    }
  
    public function rewind() {
      $this->pointer = 0;
    }
  
    public function valid() {
      // count() indicates how many items are in the list
      return $this->pointer < count($this->items);
    }
}
  
  // A function that uses iterables
function printIterable2(iterable $myIterable) {
    foreach($myIterable as $item) {
      echo $item;
    }
}
  
// Use the iterator as an iterable
$iterator = new MyIterator(["a", "b", "c"]);
echo "<br>";
printIterable2($iterator);


?>