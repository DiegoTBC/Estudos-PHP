<?php 

namespace Alura;
//$calculadora = new \Alura\Calculadora();

class Calculadora
{
    public function calculaMedia(array $notas): float
    {
        $tamArray = sizeof($notas);
        if($tamArray > 0){
            $soma = 0;
            foreach($notas as $a){
                $soma += $a;
            }
            return $soma / $tamArray;
        }
    }
}


?>