<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'user_id',
        'primary',
        'number',
        'model',
        'company'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the groups that belong to the phone.
     */
    public function groups()
    {
        return $this->hasManyThrough('App\Group','App\User');
    }

    /**
     * Get the phone locations that belong to the user
     *
     */
    public function locations()
    {
        return $this->hasManyThrough('App\Location','App\User');
    }
}
