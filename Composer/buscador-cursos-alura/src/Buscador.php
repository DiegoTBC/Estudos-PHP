<?php

namespace Alura\BuscadorDeCursos;

use Psr\Http\Client\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url, string $seletor): array
    {
        $resposta = $this->httpClient->request("GET", $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        $elementosCursos = $this->crawler->filter($seletor);
        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}
