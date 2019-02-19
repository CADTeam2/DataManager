<?php

namespace App;

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
        'username', 'password', 'title', 'firstName', 'lastName', 'contactNo', 'email',
    ];
    
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
