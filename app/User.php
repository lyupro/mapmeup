<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'lastname',
        'phone_id',
        'location_id'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    /**
     * Get the location associated with the user.
     */
    public function location()
    {
        return $this->hasMany('App\Location');
    }
}
