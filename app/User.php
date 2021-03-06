<?php

namespace App;


use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasApiTokens;
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname'
    ];

    //Accessors & Mutators

    /**
     * @param $value
     * @return string
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @param $value
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * @param $value
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['lastname'] = strtolower($value);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->lastname;
    }

    /**
     * Get the phone associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    /**
     * Get the phone associated with the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'users_in_groups', 'user_id', 'group_id');
    }

    /**
     * Get the location associated with the user.
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
