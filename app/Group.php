<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
        'description',
        'owner_id'
    ];

    /**
     * Get users that belong to the group.
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Get owner that owns the group.
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}
