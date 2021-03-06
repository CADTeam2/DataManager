<?php

namespace App;

use Attendance;
use Event;
use Question;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, SoftDeletes;

    /**
     * The table containing the Users.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key for the User model.
     *
     * @var string
     */
    protected $primaryKey = 'userID';

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
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        // The password, while normally hidden, is visable to allow a quick and dirty
        // login system placeholder.
        // 'password',
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
     * Gets the Events that are related to this model.
     *
     * @return Relationship
     */
    public function events(){
        return $this->hasMany('Event');
    }
    
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
