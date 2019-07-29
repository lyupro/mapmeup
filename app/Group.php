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
        return $this->belongsToMany(User::class, 'users_in_groups', 'group_id', 'user_id');
    }

    /**
     * Get owner that owns the group.
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
