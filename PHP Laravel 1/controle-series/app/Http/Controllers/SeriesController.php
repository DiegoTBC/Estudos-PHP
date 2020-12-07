<?php


namespace App\Http\Controllers;


use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\NovaSerie;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\EnviarEmail;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use function foo\func;
use function Sodium\compare;

class SeriesController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create(Request $request)
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criador)
    {
        DB::transaction(function () use($criador, $request) {
            $serie = $criador->criarSerie($request->nome,
                $request->qtd_temporadas,
                $request->ep_por_temporada);

            $request->session()->flash('mensagem', "Série {$serie->id} e suas temporadas e episodios foram criada com sucesso");
        });

        EnviarEmail::novaSerie($request);

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $serieNome = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash('mensagem', "Série $serieNome removida com sucesso");

        return redirect()->route('listar_series');
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
