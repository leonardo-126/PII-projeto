<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncidenteController extends Controller
{
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
    }
}
