<?php

namespace App\Models;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;

class Organizacao extends NeoEloquent  
{  
    protected $label = 'Organizacao';  

    protected $fillable = [  
        'Nome_departamento',  
        'Nome_organizacao',  
        'Organizacao_id',  
        'email',  
    ];  

    /**
     * Relacionamento com Endereço (HasOne)
     */
 
    
     
    
        public function enderecos()
        {
            return $this->hasOne(EnderecoOrganizacao::class, 'organizacao_id');  // Definindo a chave estrangeira correta
        }
    
        public function telefones()
        {  
            return $this->hasMany(TelefoneOrganizacao::class);   
        }
    
    
}
