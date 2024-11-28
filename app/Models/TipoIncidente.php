<?php

namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;


class TipoIncidente extends NeoEloquent
{

    protected $connection = 'neo4j';
    
    protected $label = 'TipoIncidente';  

    protected $fillable = [  
        'Tipo_recorrencia',  
        'Tipo_incidente_id',  
        'descricao',  
    ];  
    public function incidentes()
    {  
        return $this->belongsTo(Incidente::class,'tipo_incidente_id');  
    } 
  
}
