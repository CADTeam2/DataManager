<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sessionID',
        'userID',
        'userType',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function session(){
        return $this->belongsTo(Session::class);
    }
}

