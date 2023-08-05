<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
// use Illuminate\Database\Query\Builder;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    ];

    public function jabatan()
    {
        return $this->belongsToMany(Position::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function scopeNotRole(Builder $query, $roles, $guard = null): Builder 
    { 
         if ($roles instanceof Collection) { 
             $roles = $roles->all(); 
         } 
  
         if (! is_array($roles)) { 
             $roles = [$roles]; 
         } 
  
         $roles = array_map(function ($role) use ($guard) { 
             if ($role instanceof Role) { 
                 return $role; 
             } 
  
             $method = is_numeric($role) ? 'findById' : 'findByName'; 
             $guard = $guard ?: $this->getDefaultGuardName(); 
  
             return $this->getRoleClass()->{$method}($role, $guard); 
         }, $roles); 
  
         return $query->whereHas('roles', function ($query) use ($roles) { 
             $query->where(function ($query) use ($roles) { 
                 foreach ($roles as $role) { 
                     $query->where(config('permission.table_names.roles').'.id', '!=' , $role->id); 
                 } 
             }); 
         }); 
    }
}
