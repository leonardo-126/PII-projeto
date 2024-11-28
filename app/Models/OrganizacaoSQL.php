<?php  

namespace App\Models;  

use Carbon\Carbon;  
use Illuminate\Auth\Authenticatable;  
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Database\Eloquent\Relations\HasMany;  
use Illuminate\Notifications\Notifiable;  
use Laravel\Passport\HasApiTokens;  
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;  

class OrganizacaoSQL extends Model implements AuthenticatableContract  
{  
    use HasApiTokens, Notifiable, Authenticatable;   

    protected $table = "organizacoes";  

    protected $fillable = [  
        'name',  
        'email',  
        'password',  
        'type'  
    ];  

    // Método para formatar data, se necessário  
    public function fromDateTime($value)  
    {  
        return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');  
    }  

    public function organizacoestelefones(): HasMany  
    {  
        return $this->hasMany(OrganizacaoTelefone::class);  
    }  
    public function Enderecos():HasMany
    {
        return $this->hasMany(organizacaoEndereco::class);
    }

    /**  
     * The attributes that should be hidden for serialization.  
     *  
     * @var array<int, string>  
     */  
    protected $hidden = [  
        'password',  
        'remember_token',  
    ];  

    /**  
     * The attributes that should be cast.  
     *  
     * @var array<string, string>  
     */  
    protected $casts = [  
        'email_verified_at' => 'datetime',  
        'password' => 'hashed',  
    ];  
}