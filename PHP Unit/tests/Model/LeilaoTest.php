<?php


namespace Alura\Leilao\Test\Model;


use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class LeilaoTest extends TestCase
{

    /**
     * @dataProvider geraLances
     */
    public function testLeilaoDeveReceberLances(int $qtdLances, Leilao $leilao, array $valores)
    {
        self::assertCount($qtdLances, $leilao->getLances());

        foreach ($valores as $i => $valorEsperado){
            self::assertEquals($valorEsperado, $leilao->getLances()[$i]->getValor());
        }

    }

    public function testLeilaoNaoDeveReceberLancesRepetidos()
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Usuario não pode propor 2 lances consecutivos');

        $leilao = new Leilao('Variante');
        $ana = new Usuario('Ana');
        $leilao->recebeLance(new Lance($ana, 2000));
        $leilao->recebeLance(new Lance($ana, 1000));

        /*self::assertCount(1, $leilao->getLances());
        self::assertEquals(2000, $leilao->getLances()[0]->getValor());*/
    }

    public function testLeilaoNaoDeveAceitarMaisDe5LancesPorUsuario()
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Leilão não pode aceitar mais de 5 lances por usuário');

        $leilao = new Leilao('Brasilia');
        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        $leilao->recebeLance(new Lance($maria,1500));
        $leilao->recebeLance(new Lance($joao,1600));
        $leilao->recebeLance(new Lance($maria,1700));
        $leilao->recebeLance(new Lance($joao,1800));
        $leilao->recebeLance(new Lance($maria,1900));
        $leilao->recebeLance(new Lance($joao,2000));
        $leilao->recebeLance(new Lance($maria,2100));
        $leilao->recebeLance(new Lance($joao,2200));
        $leilao->recebeLance(new Lance($maria,2300));
        $leilao->recebeLance(new Lance($joao,2400));

        $leilao->recebeLance(new Lance($maria,6000));

        /*self::assertCount(10, $leilao->getLances());
        self::assertEquals(2400, $leilao->getLances()[array_key_last($leilao->getLances())]->getValor());*/
    }

    public function geraLances()
    {
        $joao = new Usuario('Joao');
        $maria = new Usuario('Maria');
        $leilaoCom2Lances = new Leilao('Fiat 147');
        $leilaoCom2Lances->recebeLance(new Lance($joao, 2000));
        $leilaoCom2Lances->recebeLance(new Lance($maria, 2500));

        $leilaoCom1Lance = new Leilao('Fiat 147');
        $leilaoCom1Lance->recebeLance(new Lance($joao, 5000));

        return [
          '2-lances' => [2, $leilaoCom2Lances, [2000, 2500]],
            '1-lance' => [1, $leilaoCom1Lance, [5000]]
        ];
    }
}