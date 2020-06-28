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
        'name', 'username', 'password', 'matricNo'
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
        
    ];

    public function frinner()
    {
        return $this->hasMany('App\Frinner', 'user_id', 'id');
    }

    public function taken_frinner()
    {
        return $this->hasMany('App\Frinner', 'taker_id', 'id');
    }

    public function frinner_queue()
    {
        return $this->hasMany('App\FrinnerQueue', 'user_id', 'id');
    }
}
