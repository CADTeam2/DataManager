<?php

namespace App;

use Attendance;
use Event;
use Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

    /**
     * The table containing the Sessions.
     *
     * @var string
     */
    protected $table = "Sessions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'eventID',
        'startTime',
        'endTime',
        'acceptingQuestions',
        'roomName',
        'speaker',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'startTime',
        'endTime',
        'deleted_at',
    ];
    
    /**
     * Gets the Event this model belongs to.
     *
     * @return Relationship
     */
    public function event(){
        return $this->belongsTo('Event');
    }
    
    /**
     * Gets the Questions that are related to this model.
     *
     * @return Relationship
     */
    public function questions(){
        return $this->hasMany('Question');
    }
    
    /**
     * Gets the Attendances that are related to this model.
     *
     * @return Relationship
     */    
    public function attendances(){
        return $this->hasMany('Attendance');
    }
    
}
