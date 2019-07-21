<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'latitude',
        'longitude',
        'type'
    ];

    /**
     * Get the user that was at the location.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
