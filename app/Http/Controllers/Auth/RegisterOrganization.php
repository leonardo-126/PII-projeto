<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\organizacaoEndereco;
use App\Models\OrganizacaoSQL;
use App\Models\OrganizacaoTelefone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisterOrganization extends Controller
{
    public function create(){
        return Inertia::render('Auth/RegisterOrganizacao');
    }
    public function store(Request $request){

        // tratamento de dados lembrando que em type = 0=policial 1= bombeiros 2 assistente
        $data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'type'=>'required|integer'
        ]);
     
        $data_telefone = $request->validate([
            'telefone' => 'nullable|string|max:60'
        ]);
        
        
     

        $data_endereco = $request->validate([
            'cidade'=> 'required|string|max:130',  
            'estado'=> 'required|string|max:120',  
            'numero'=> 'required|string|max:5',  
            'cep'=> 'required|string|max:9',  
            'rua'=> 'required|string|max:255',  
        ]);
       // dd($data,$data_telefone, $data_endereco);

        $organization = OrganizacaoSQL::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
            'type'=> $data['type']
        ]);
        $telefone = OrganizacaoTelefone::create([
            'numeroTelefone'=>$data_telefone['telefone'],  
            'organizacao_id'=>$organization->id,  
        ]);
        $endereco = organizacaoEndereco::create([
            'cidade'=>$data_endereco['rua'],  
            'estado'=>$data_endereco['estado'],  
            'numero'=>$data_endereco['numero'],  
            'cep'=>$data_endereco['cep'],  
            'rua'=>$data_endereco['rua'],  
            'organizacao_id'=>$organization->id
        ]);

        return redirect()->route('login.org');
  
    }
    public function update(Request $request, OrganizacaoSQL $organizacao) {  
        $data = $request->validate([  
            'name' => 'required|string',  
            'email' => 'required|string',  
            'password' => 'required|string',  
            'type' => 'required|integer'  
        ]);  
    
        $data_telefone = $request->validate([  
            'telefone' => 'nullable|string|max:60'  
        ]);  
    
        $data_endereco = $request->validate([  
            'cidade' => 'required|string|max:130',  
            'estado' => 'required|string|max:120',  
            'numero' => 'required|string|max:5',  
            'cep' => 'required|string|max:9',  
            'rua' => 'required|string|max:255',  
        ]);  
        
        // Atualizando a organização  
        $organizacao->update($data);  
    
        // Atualizando o telefone específico da organização  
        $telefone = OrganizacaoTelefone::where('organizacao_id', $organizacao->id)->first();  
        if ($telefone) {  
            $telefone->update($data_telefone);  
        } else if ($data_telefone['telefone']) {  
            // Se não existir, você pode adicionar código para criar um novo registro de telefone  
        }  
        
        // Atualizando o endereço específico da organização  
        $endereco = OrganizacaoEndereco::where('organizacao_id', $organizacao->id)->first();  
        if ($endereco) {  
            $endereco->update($data_endereco);  
        } else {  
            // Se não existir, você pode adicionar código para criar um novo registro de endereço  
        }  
    
        return response()->json(['mensagem' => 'Organização atualizada com sucesso']);  
    }
}
