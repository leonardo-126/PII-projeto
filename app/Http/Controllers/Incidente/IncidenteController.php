<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use App\Models\Notificacao;
use App\Models\Organizacao;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IncidenteController extends Controller
{
    /*
    public function getDenuncias()
    {
        $denuncias = Incidente::with([
            'usuario',           // Relacionamento com o usuário (nome)
            'enderecoincidentes', // Relacionamento com endereço (cidade)
            'tipoincidente'      // Relacionamento com tipo de incidente
        ])->get();

        // Formatar os dados antes de retornar
        $formatted = $denuncias->map(function ($incidente) {
            return [
                'nome' => $incidente->usuario->first()->nome ?? 'N/A', // Primeiro usuário relacionado
                'endereco' => $incidente->enderecoincidentes->first()->cidade ?? 'N/A', // Primeiro endereço relacionado
                'text' => $incidente->descricao ?? 'N/A', // Descrição do incidente
                'type' => $incidente->tipoincidente->first()->Tipo_recorrencia ?? 'N/A' // Tipo do incidente
            ];
        });

        return response()->json($formatted);
    }*/
    public function store(Request $request){
        $user = Auth::id();

        $usuario = User::where('id',$user)->get();
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
         $data_incidente = $request->validate([
     
            'data_hora'=>'required|date',  
         ]);
         $data_tipo_incidente = $request->validate([
            'Tipo_recorrencia'=>'required|string',  
         
            'descricao'=>'required|string',  

         ]);
         $data_endereco_incidente = $request->validate([
            'cidade'=>'required|string',  
            'estado'=>'required|string', 
            'numero'=>'required|string', 
            'complemento'=>'required|string', 
            'referencia'=>'required|string', 
            'cep'=>'required|string', 
            'rua'=>'required|string', 
         ]);
         $data_notificacao = $request->validate([
            'dataHoraNotificacao'=>'required|string',  
         ]);
         $usuarioList=[];
         foreach($usuario as $usua){
            $usuarioList[]=[
                'Nome_completo'=>$usua->name,
                'Tipo_usuario'=>$usua->type,
    
                'email'=>$usua->email,

            ];

         }

         try {
            $usuarioneo = Usuario::create( $usuarioList);


            $incidente = new Incidente($data_incidente);
            $usuarioneo->inicidentes()->save($incidente);

            $notificacao = new Notificacao($data_notificacao);
            $incidente->notificacoes()->save($notificacao);

            
     
            $organizacao = new Organizacao($data);  
       
      

           
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
}