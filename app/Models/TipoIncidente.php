<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use Vinelab\NeoEloquent\Eloquent\Relations\HasMany;

class TipoIncidente extends NeoEloquent
{
    //
    protected $label = 'TipoIncidente';  

    protected $fillable = [  
        'Tipo_recorrencia',  
        'Tipo_incidente_id',  
        'descricao',  
    ];  
    public function incidentes():HasMany
    {  
        return $this->hasMany(Incidente::class);  
    } 
  
}
