<?php

namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;  


class Notificacao extends NeoEloquent
{
    protected $label = 'Notificacao';  

    protected $fillable = [  
        'dataHoraNotificacao',  
        'Notificacao_id',  
    ];  
    public function incidente()
    {
        return $this->belongsTo(Incidente::class,'Incidente_id','Incidente_id');
    }

 
}
