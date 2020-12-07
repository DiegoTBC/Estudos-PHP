<!--<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Nova Série</h2>
    <p>Nome da Série: {{$nome}}</p>
    <p>Qtd Temporadas: {{$qtdTemporadas}}</p>
    <p>Qtd Episodios: {{$qtdEpisodios}}</p>
</body>
</html>-->

@component('mail::message')
### Nova Série
## Nome da Série: {{$nome}}
## Qtd Temporadas: {{$qtdTemporadas}}
## Qtd Episodios: {{$qtdEpisodios}}
@endcomponent()
