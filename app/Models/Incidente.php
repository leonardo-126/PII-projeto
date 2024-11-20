<?php

namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;  

class Incidente extends NeoEloquent
{
    protected $label = 'Incidente';  

    protected $fillable = [  
        'Incidente_id',  
        'data_hora',  
    ];  
    public function organizacao()
    {
        return $this->belongsTo(Organizacao::class,'ENVIADA_PARA');
    }
    public function notificacoes()
    {
        return $this->hasMany(Notificacao::class,'NOTIFICADO_POR');
    }
    public function enderecoincidentes()
    {
        return $this->hasMany(EnderecoIncidente::class,'DE_TIPO');
    }
    public function tipoincidente(){
        return $this->hasMany(TipoIncidente::class, 'DE_TIPO');
    }

    // usuario irá informar o incidente 
    public function usuario(){
        return $this->hasMany(Usuario::class,'REPORTOU');
    }
}
