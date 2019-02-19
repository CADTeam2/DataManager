<?php

namespace App;

use Attendance;
use Question;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'title',
        'firstName',
        'lastName',
        'contactNo',
        'email',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];
    
    /**
     * Gets the Attendances that are related to this model.
     *
     * @return Relationship
     */
    public function attendances(){
        return $this->hasMany('Attendance');
    }

    /**
     * Gets the Questions that are related to this model.
     *
     * @return Relationship
     */
    public function questions(){
        return $this->hasMany('Question');
    }
}
