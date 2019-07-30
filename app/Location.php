<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{

    use SoftDeletes;

    /**
     * @var array
     */
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
        return $this->belongsTo(User::class);
    }

    /**
     * Get the phone that was at the location.
     */
    public function phone()
    {
        return $this->hasOneThrough(Phone::class,User::class);
    }
}
