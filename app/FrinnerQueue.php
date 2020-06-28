<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrinnerQueue extends Model
{

    protected $fillable = [
        'user_id', 'taken'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
