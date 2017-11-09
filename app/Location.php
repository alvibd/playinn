<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function lobbies()
    {
        return $this->hasMany('App\Lobby');
    }
}
