<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    protected $fillable = [
        'name', 'persons_id', 'email', 'password', 'status', 'reg_del','user_mod'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function format()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status == 1 ? 'active': 'inactive',
            'user_mod' => $this->user_mod,
            'persons_id' => $this->persons_id,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
            'roles' => $this->roles,
            'person' => $this->person->name.' '.$this->person->last_name_pat.' '.$this->person->last_name_mat,

        ];
    }
    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'users_roles', 'users_id', 'roles_id')->withTimestamps();
    }
    public function person()
    {
        dd($this->belongsTo(Persons::class, 'persons_id','id'));
    }
}
