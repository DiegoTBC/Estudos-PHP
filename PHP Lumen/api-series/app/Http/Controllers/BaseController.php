<?php


namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected string $classe;

    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(
                $this->classe::create($request->all()),
                201
            );
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);

        if (is_null($recurso)) {
            return response()->json("", 204);
        }

        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        /** @var Model $recurso */
        $recurso = $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }
        $recurso->fill($request->all());
        $recurso->save();

        return $recurso;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = $this->classe::destroy($id);
        if ($qtdRecursosRemovidos === 0) {
            return response()->json(['erro' => 'Recurso não encontrado'], 404);
        }
        return response()->json("", 204);
    }
}
