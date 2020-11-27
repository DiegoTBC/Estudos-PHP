<?php

//==================================================================================
//                                     NAMESPACES
//Os namespaces são qualificadores que resolvem dois problemas diferentes:
// * Eles permitem uma melhor organização agrupando classes que trabalham juntas para realizar uma tarefa
// * Eles permitem que o mesmo nome seja usado para mais de uma classe
//Por exemplo, você pode ter um conjunto de classes que descrevem uma tabela HTML, como Tabela, Linha e Célula,
//enquanto também tem outro conjunto de classes para descrever móveis, como Mesa, Cadeira e Cama.
//Os namespaces podem ser usados ​​para organizar as classes em dois grupos diferentes, ao mesmo tempo que evita que as duas classes Table e Table sejam misturadas.
//==================================================================================

//Os namespaces são declarados no início de um arquivo usando a palavra-chave namespace:
namespace Html;

//Constantes, classes e funções declaradas neste arquivo pertencerão ao namespace Html:
class Table {
    public $title = "";
    public $numRows = 0;
    public function message() {
      echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>";
    }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;

//Para maior organização, é possível ter namespaces aninhados:
namespace Code\Html;

//Usando namespaces
//Qualquer código que segue uma declaração de namespace está operando dentro do namespace,
//então as classes que pertencem ao namespace podem ser instanciadas sem quaisquer qualificadores
//Para acessar classes de fora de um namespace, a classe precisa ter o namespace anexado a ela.

//Exemplo: Use classes do namespace Html:
$table = new Html\Table();
$row = new Html\Row();

//Quando muitas classes do mesmo namespace estão sendo usadas ao mesmo tempo, é mais fácil usar a palavra-chave do namespace:
//Use classes do namespace Html sem a necessidade do Html \ qualifier:
namespace Html;
$table = new Table();
$row = new Row();

//Namespace Alias
//Pode ser útil dar a um namespace ou classe um alias para facilitar a escrita. Isso é feito com a palavra-chave use:
use Html as H;
$table = new H\Table();

//Dê a uma classe um alias:
use Html\Table as T;
$table = new T();
?>

<!DOCTYPE html>
<html>
<body>

<?php
$table->message();
?>

</body>
</html>