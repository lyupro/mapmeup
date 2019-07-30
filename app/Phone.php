<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'number',
        'primary',
        'model',
        'company',
        'os',
        'os_version'
    ];

    //Accessors & Mutators

    /**
     *
     */


    public function getFullData()
    {
        return $this->number . "<br>" . $this->model . "<br>" . $this->company . "<br>" . $this->os . "<br>" . $this->os_version . "<br>";
    }

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
