<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Filterable;

    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;

    public static function getRoles() : array {
        return [
            self::ROLE_ADMIN => 'Администратор',
            self::ROLE_USER => 'Клиент'
        ];
    }

    public function getRoleAttribute() : string {
        return self::getRoles()[$this->role_id];
    }

    public function getAvatarAttribute() : string {
        return 'storage/'.$this->avatar_path;
    }

    public function orders() {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'avatar_path',
        'address',
        'phone'
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
}
