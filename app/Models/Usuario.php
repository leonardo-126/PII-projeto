<?php

namespace App\Models;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;  

class Usuario extends NeoEloquent
{
    //
    protected $connection = 'neo4j';
    protected $label = "Usuario";
    protected $fillable = [
        'Nome_completo',
        'Tipo_usuario',
        'Usuario_id',
        'email',
        'senha'

    ];

    public function inicidentes(){
        return $this->hasMany(Incidente::class);
    }
}
