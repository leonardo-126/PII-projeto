<?php
 
namespace App\Models;
 
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;
 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
 

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
        
    ];

    public function fromDateTime($value)  
    {  
        return Carbon::parse(parent::fromDateTime($value))->format('Y-d-m H:i:s');  
    }  

    
    public function telefones():HasMany
    {
        return $this->hasMany(Telefoneusers::class);
    }
    public function enderecos():HasMany
    {
        return $this->hasMany(EnderecosUsers::class);
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
<<<<<<< HEAD
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
=======
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["user", "org", "manager"][$value] ?? 'unknown',
        );
    }
    

>>>>>>> teste
}
