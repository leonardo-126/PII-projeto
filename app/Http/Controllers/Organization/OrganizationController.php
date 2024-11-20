<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\EnderecoOrganizacao;
use App\Models\Organizacao;
use App\Models\TelefoneOrganizacao;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  
    {
        // Validação dos dados
        $data = $request->validate([  
            'Nome_departamento' => 'required|string|max:255',  
            'Nome_organizacao' => 'required|string|max:255',  
            'email' => 'nullable|email|max:255'
        ]);  
    
        $data_telefone = $request->validate([
            'numeroTelefone' => 'required|string|max:45'
        ]);
    
        $data_endereco = $request->validate([
            'cidade'=> 'required|string|max:130',  
            'estado'=> 'required|string|max:120',  
            'numero'=> 'required|string|max:5',  
            'cep'=> 'required|string|max:9',  
            'rua'=> 'required|string|max:255',  
        ]);
    
        try {
            // Criação da organização
            $organizacao = Organizacao::create($data);  
    
            // Criação do telefone associado
            $telefone = new TelefoneOrganizacao($data_telefone); // Criação do objeto telefone
            $organizacao->telefones()->save($telefone); // Usando save ao invés de create
    
            // Criação do endereço associado
            $enderecos = new EnderecoOrganizacao($data_endereco); // Criação do objeto endereço
            $organizacao->enderecos()->save($enderecos); // Usando save ao invés de create
    
            return response()->json([
                'insercao' => "Inserção realizada com sucesso",   
                'organizacao' => $organizacao,  
                'telefone' => $telefone,
                'endereco' => $enderecos
            ], 200);
    
        } catch (\Exception $e) {
            // Retorno em caso de erro
            return response()->json([
                'erro' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Organizacao $organizacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organizacao $organizacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizacao $organizacao)
    {
        //
    }
}
