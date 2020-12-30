<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = "Nome Teste";
        $serie = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serie);
        $this->assertDatabaseHas('series', ['nome' => "Nome Teste"]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serie->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);

    }
}
