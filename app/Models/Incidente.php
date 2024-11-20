<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;  

class Incidente extends NeoEloquent
{
    protected $label = 'Incidente';  

    protected $fillable = [  
        'Incidente_id',  
        'data_hora',  
    ];  
    public function organizacao():BelongsTo
    {
        return $this->belongsTo(Organizacao::class,'organizacao_id','Organizacao_id');
    }
}
