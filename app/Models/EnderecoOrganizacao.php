<?php
namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class EnderecoOrganizacao extends NeoEloquent
{
    // Definição do label
    protected $label = "EnderecoOrganizacao";

    // Campos preenchíveis
    protected $fillable = [
        'cidade',  
        'estado',  
        'numero',  
        'cep',  
        'rua',  
        'organizacao_id',  // A chave estrangeira correta
    ];

    // Relacionamento com a organização
    public function organizacao()
    {
        // Definir explicitamente a chave estrangeira 'organizacao_id'
        return $this->belongsTo(Organizacao::class, 'organizacao_id');
    }
}
