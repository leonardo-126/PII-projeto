<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrganizacaoTelefone extends Model
{
    protected $table = "telefoneorganizacoes";
    protected $fillable = [  
        'numeroTelefone',  
        'organizacao_id',  
    ]; 
    public function fromDateTime($value)
    {
        return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');
    } 

    public function organizacao():BelongsTo
    {
        return $this->belongsTo(OrganizacaoSQL::class);
    }
}
