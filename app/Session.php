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
        'eventID', 'startTime', 'endTime', 'acceptingQuestions', 'roomName', 'speaker',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'startTime' => 'datetime', 'endTime' => 'datetime',
    ];
    
    public function event(){
        return $this->belongsTo(Event::class);
    }
    
    public function question(){
        return $this->hasMany(Question::class);
    }
        
    public function attendance(){
        return $this->hasMany(Attendance::class);
    }
    
}
