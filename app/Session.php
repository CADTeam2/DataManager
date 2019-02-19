<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

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
    
    public function event(){
        return $this->belongsTo(Event::class);
    }
    
    public function questions(){
        return $this->hasMany(Question::class);
    }
        
    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
    
}
