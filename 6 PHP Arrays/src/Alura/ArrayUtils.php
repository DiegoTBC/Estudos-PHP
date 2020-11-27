<?php declare(strict_types = 1);
//desativa os castings automaticos

namespace Alura;

class ArrayUtils
{
    public static function remover($elemento, &$array)
    {
        $posicao = array_search($elemento, $array, true);
        //type juggling
        if(is_int($posicao)){
            unset($array[$posicao]);
        } else {
            echo "Não foi encontrado";
        }      
    }

    public static function saldoMaior(int $saldo, array $array): array{
        $correntistas = array();
        foreach($array as $chave => $valor){
            if ($valor > $saldo){
                $correntistas[] = $chave;
            }
        }
        return $correntistas;
    }
}

?>