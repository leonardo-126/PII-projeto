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
        $organizacoes = Organizacao::with(['telefones', 'enderecos'])->get();
        return response()->json($organizacoes);
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
            $telefone = new TelefoneOrganizacao($data_telefone); 
            $organizacao->telefones()->save($telefone); // Associando o telefone à organização

            // Criação do endereço associado
            $endereco = new EnderecoOrganizacao($data_endereco); 
            $organizacao->enderecos()->save($endereco); // Associando o endereço à organização

            // Criando o relacionamento no Neo4j:
            
            // Criação explícita do relacionamento entre Organizacao e TelefoneOrganizacao
          
            return response()->json([
                'insercao' => "Inserção realizada com sucesso",   
                'organizacao' => $organizacao,  
                'telefone' => $telefone,
                'endereco' => $endereco
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
    public function update(Request $request, $id)
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
            // Buscar a organização pelo ID
            $organizacao = Organizacao::findOrFail($id);

            // Atualizar os dados da organização
            $organizacao->update($data);

            // Atualizar os telefones associados
            if ($organizacao->telefones()->exists()) {
                $telefone = $organizacao->telefones()->first();
                $telefone->update($data_telefone);
            } else {
                // Se não existir, cria um novo telefone
                $organizacao->telefones()->create($data_telefone);
            }

            // Atualizar os endereços associados
            if ($organizacao->enderecos()->exists()) {
                $endereco = $organizacao->enderecos()->first();
                $endereco->update($data_endereco);
            } else {
                // Se não existir, cria um novo endereço
                $organizacao->enderecos()->create($data_endereco);
            }

            return redirect()->route('organizacoes.index')->with('success', 'Organização atualizada com sucesso!');
        } catch (\Exception $e) {
            // Em caso de erro, retorna com a mensagem de erro
            return redirect()->back()->with('error', 'Erro ao atualizar organização: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organizacao $organizacao)
    {
        //
    }
}
