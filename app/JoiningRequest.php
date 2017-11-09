<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoiningRequest extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function lobbies()
    {
        return $this->belongsTo('App\Lobby');
    }
}
