<?php


namespace App\Services;


use App\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{

    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $epPorTemporada,
        ?string $capa
    ) : Serie
    {
        $serie = null;
        DB::transaction(function () use ($nomeSerie, $qtdTemporadas, $epPorTemporada, $capa, &$serie)
        {
            $serie = Serie::create(['nome' => $nomeSerie, 'capa' => $capa]);
            $this->criaTemporadas($qtdTemporadas, $epPorTemporada, $serie);

        });
        return $serie;
    }

    private function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie)
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criaEpisodios($epPorTemporada, $temporada);
        }
    }

    private function criaEpisodios(int $epPorTemporada, Model $temporada): void
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
