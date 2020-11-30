<?php


namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

    public function store(SeriesFormRequest $request)
    {
        //$nome = $request->get('nome');
        $nome = $request->nome;
        $serie = new Serie();
        $serie->nome = $nome;
        $serie->save();

        $request->session()->flash('mensagem', "Série {$serie->id} criada com sucesso");

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('mensagem', "Série removida com sucesso");

        return redirect()->route('listar_series');
    }
}
