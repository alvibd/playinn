<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lobby extends Model
{
    protected $fillable = [
      'type', 'gender', 'privacy', 'start_time', 'end_time', 'capacity'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function joiningRequests()
    {
        return $this->hasMany('App\JoiningRequest');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
