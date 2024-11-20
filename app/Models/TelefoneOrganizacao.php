<?php

namespace App\Models;


use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;  


class TelefoneOrganizacao extends NeoEloquent
{
    //

    protected $label = 'TelefoneOrganizacao';  

    protected $fillable = [  
        'numeroTelefone',  
        'Telefone_id',  
    ];  

    public function organizacao()
    {
        return $this->belongsTo(Organizacao::class);
    }

}