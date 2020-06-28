<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frinner extends Model
{
    protected $fillable = [
        'user_id', 'taker_id', 'taken',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function taker()
    {
        return $this->belongsTo('App\User', 'taker_id');
    }
}
