<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'lastname',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

    /**
     * Get the phone associated with the user.
     */
    public function groups()
    {
        return $this->belongsToMany('App\Group', 'users_in_groups');
    }

    /**
     * Get the location associated with the user.
     */
    public function locations()
    {
        return $this->hasMany('App\Location');
    }
}
