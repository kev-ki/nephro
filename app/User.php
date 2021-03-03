<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'prenom', 'password', 'type_user', 'status', 'telephone','chefservice',
    ];

    protected $attributes = [
        'status' => '1'
    ];

    protected $attribute = [
        'type_user' => '1'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getStatusAttribute($attributes)
    {
        return $this->getStatusOptions()[$attributes];
    }

    public function getStatusOptions()
    {
        return [
            '0' => 'Bloqué',
            '1' => 'Actif',
        ];
    }

    public function getUserTypeAttribute($attribute)
    {
        return $this->getUserTypeOptions()[$attribute];
    }

    public function getUserTypeOptions()
    {
        return [
            '0' => 'Administrateur',
            '1' => 'Médecin',
            '2' => 'Infirmier',
            '3' => 'Secretaire',
        ];
    }
}
