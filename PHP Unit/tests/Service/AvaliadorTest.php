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

    private Avaliador $leiloeiro;

    public function setUp(): void
    {
        $this->leiloeiro = new Avaliador();
    }


    /**
     * @dataProvider leilaoEmOrdemAleatoria
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDecrescente
     */
    public function testAvaliadorDeveEncontrarMaiorValor(Leilao $leilao)
    {
        $this->leiloeiro->avalia($leilao);

        $maiorValor = $this->leiloeiro->maiorValor();

        self::assertEquals(2500, $maiorValor);
    }

    /**
     * @dataProvider leilaoEmOrdemAleatoria
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDecrescente
     */
    public function testAvaliadorDeveEncontrarMenorValor(Leilao $leilao)
    {
        $this->leiloeiro->avalia($leilao);

        $menorValor = $this->leiloeiro->menorValor();

        self::assertEquals(1700, $menorValor);
    }

    /**
     * @dataProvider leilaoEmOrdemAleatoria
     * @dataProvider leilaoEmOrdemCrescente
     * @dataProvider leilaoEmOrdemDecrescente
     */
    public function testAvaliadorDeveEncontrarOsTresMaioresValores(Leilao $leilao)
    {
        $this->leiloeiro->avalia($leilao);

        $maioresValores = $this->leiloeiro->maioresLances();

        self::assertCount(3, $maioresValores);
        self::assertEquals(2500, $maioresValores[0]->getValor());
        self::assertEquals(2000, $maioresValores[1]->getValor());
        self::assertEquals(1700, $maioresValores[2]->getValor());

    }

    public function leilaoEmOrdemCrescente()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $diego = new Usuario('Diego');
        $laura = new Usuario('Laura');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($diego, 2000));
        $leilao->recebeLance(new Lance($laura, 2500));

        return [
            'ordem-crescente' => [$leilao]
        ];
    }

    public function leilaoEmOrdemDecrescente()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $diego = new Usuario('Diego');
        $laura = new Usuario('Laura');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($laura, 2500));
        $leilao->recebeLance(new Lance($diego, 2000));
        $leilao->recebeLance(new Lance($ana, 1700));

        return [
            'ordem-decrescente' =>[$leilao]
        ];
    }

    public function leilaoEmOrdemAleatoria()
    {
        $leilao = new Leilao('Fiat 147 0KM');

        $diego = new Usuario('Diego');
        $laura = new Usuario('Laura');
        $ana = new Usuario('Ana');

        $leilao->recebeLance(new Lance($laura, 2500));
        $leilao->recebeLance(new Lance($ana, 1700));
        $leilao->recebeLance(new Lance($diego, 2000));

        return [
            'ordem-aleatoria' => [$leilao]
        ];
    }

}