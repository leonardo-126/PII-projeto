<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
use Laudis\Neo4j\ClientBuilder;
use Illuminate\Http\Request;

class Neo4jController extends Controller
{
    protected $client;

    public function __construct()
    {
        // Crie a conexão com o Neo4j usando as variáveis do .env
        $this->client = ClientBuilder::create()
            ->withDriver('default', 'bolt://'.env('NEO4J_USERNAME').':'.env('NEO4J_PASSWORD').'@'.env('NEO4J_HOST').':'.env('NEO4J_PORT'))
            ->build();
    }

    public function consulta()
    {
        // Exemplo de consulta: Match retorna os primeiros 10 nós no banco
        $query = 'MATCH (n) RETURN n LIMIT 10';

        // Executa a consulta
        $result = $this->client->run($query);

        // Itera sobre os resultados e retorna o valor
        foreach ($result as $record) {
            // Supondo que o nó retornado seja impresso no terminal
            echo $record->get('n')->value();
        }
    }
}
