<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EnderecosUsers extends Model
{
    protected $fillable = [
        'cidade',  
        'estado',  
        'numero',  
        'cep',  
        'rua',  
        'organizacao_id',  // A chave estrangeira correta
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
