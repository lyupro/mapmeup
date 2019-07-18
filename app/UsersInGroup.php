<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersInGroup extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'user_type_id'
    ];
}
