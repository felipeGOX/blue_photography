<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function Rol(): Roles
    {
        /**
         * @var $rolUsuario Rol_usuario
         */
        $rolUsuario = DB::table((new Rol_usuario())->getTable())->where('id_usuario', '=', "$this->id")->first();
        $rol = Roles::find($rolUsuario->id_rol);
        return $rol;
    }

    public function Paquetes(): HasMany
    {
        return $this->hasMany(Paquetes::class, 'id_fotografo', 'id');
    }

    public function Solicitud(): HasMany
    {
        return $this->hasMany(Solicitud::class, 'id_fotografo', 'id');
    }

    public static function getAllFotografos(): Collection
    {
        $query = User::with(['paquetes'])->has('paquetes')
            ->select('users.*')
            ->join('rol_usuarios', 'users.id', '=', 'rol_usuarios.id_usuario')
            ->join('roles', 'roles.id', '=', 'rol_usuarios.id_rol')
            ->where('roles.nombre', '=', 'Fotografo');
        return  $query->get();
    }

}
