<?php


namespace Alura\Leilao\Test\Service;


use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class AvaliadorTest extends TestCase
{
    public function testAvaliadorDeveEncontrarMaiorValor()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $diego = new Usuario('Diego');
        $laura = new Usuario('Laura');

        $leilao->recebeLance(new Lance($laura, 2500));
        $leilao->recebeLance(new Lance($diego, 2000));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maiorValor = $leiloeiro->maiorValor();

        self::assertEquals(2500, $maiorValor);
    }

    public function testAvaliadorDeveEncontrarMenorValor()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $diego = new Usuario('Diego');
        $laura = new Usuario('Laura');
        $regina = new Usuario('Regina');

        $leilao->recebeLance(new Lance($diego, 2000));
        $leilao->recebeLance(new Lance($regina, 1900));
        $leilao->recebeLance(new Lance($laura, 2500));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $menorValor = $leiloeiro->menorValor();

        self::assertEquals(1900, $menorValor);
    }

    public function testAvaliadorDeveEncontrarOsTresMaioresValores()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $diego = new Usuario('Diego');
        $laura = new Usuario('Laura');
        $regina = new Usuario('Regina');
        $maria = new Usuario('Maria');
        $joao = new Usuario('Joao');

        $leilao->recebeLance(new Lance($diego, 2000));
        $leilao->recebeLance(new Lance($regina, 1900));
        $leilao->recebeLance(new Lance($laura, 2500));
        $leilao->recebeLance(new Lance($maria, 2800));
        $leilao->recebeLance(new Lance($joao, 1500));

        $leiloeiro = new Avaliador();
        $leiloeiro->avalia($leilao);

        $maioresValores = $leiloeiro->maioresLances();

        self::assertCount(3, $maioresValores);
        self::assertEquals(2800, $maioresValores[0]->getValor());
        self::assertEquals(2500, $maioresValores[1]->getValor());
        self::assertEquals(2000, $maioresValores[2]->getValor());

    }
}