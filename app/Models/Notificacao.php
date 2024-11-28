<?php

namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;  


class Notificacao extends NeoEloquent
{
    protected $connection = 'neo4j';

    protected $label = 'Notificacao';  

    protected $fillable = [  
        'dataHoraNotificacao',  
        'Notificacao_id',  
    ];  
    public function incidente()
    {
        return $this->belongsTo(Incidente::class,'Incidente_id','Incidente_id');
    }
    public function organizacao(){
        return $this->hasMany(Organizacao::class,'ENVIADA_PARA');
    }

 
}
