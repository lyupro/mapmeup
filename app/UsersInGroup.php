<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersInGroup extends Model
{
    protected $fillable = [
        'user_id',
        'group_id',
        'user_type_id'
    ];

    public function userType()
    {
        return $this->belongsTo(UserType::class);
    }
}
