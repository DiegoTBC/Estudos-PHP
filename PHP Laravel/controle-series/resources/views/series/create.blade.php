@extends('layout')

@section('cabecalho')
    Adicionar Série
@endsection

@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>

            <div class="col col-2">
                <label for="qtd_temporadas">Nº Temporadas</label>
                <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas" required>
            </div>

            <div class="col col-2">
                <label for="ep_por_temporada">Nº de Episódios</label>
                <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada" required>
            </div>
        </div>

        <div class="row">
            <div class="col col-12">
                <label for="nome">Capa</label>
                <input type="file" class="form-control" name="capa" id="capa">
            </div>
        </div>


        <button class="btn btn-primary mt-2">Adicionar</button>

    </form>

@endsection