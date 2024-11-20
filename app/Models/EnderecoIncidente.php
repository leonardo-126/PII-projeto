<?php

namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;  

class EnderecoIncidente extends NeoEloquent
{
    //
    protected $label = "EnderecoIncidente";
    protected $fillable = [  
        'cidade',  
        'estado',  
        'numero',  
        'complemento',
        'referencia',
        'cep',  
        'rua',  
        'endereco_id',
    ]; 
    
    public function incidente(){
        return $this->belongsTo(Incidente::class,'Endereco_id');
    }
}
