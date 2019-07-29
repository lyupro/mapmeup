<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'user_id',
        'number',
        'primary',
        'model',
        'company',
        'os',
        'os_version'
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the groups that belong to the phone.
     */
    public function groups()
    {
        return $this->hasManyThrough(Group::class,User::class);
    }

    /**
     * Get the phone locations that belong to the user
     *
     */
    public function locations()
    {
        return $this->hasManyThrough(Location::class,User::class);
    }
}
