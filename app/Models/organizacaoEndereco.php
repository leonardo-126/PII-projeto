<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class organizacaoEndereco extends Model
{
    //
    protected $table= 'enderecoorganizacoes';

    protected $fillable = [
        'cidade',  
        'estado',  
        'numero',  
        'cep',  
        'rua',  
        'organizacao_id',  // A chave estrangeira correta
    ];
    public function fromDateTime($value)
    {
        return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');
    }
    public function organizacao():BelongsTo
    {
        return $this->belongsTo(OrganizacaoSQL::class);
    }
}
