<?php

namespace App;

use User;
use Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The table containing the Events.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The primary key for the Event model.
     *
     * @var string
     */
    protected $primaryKey = 'eventID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userID',
        'eventName',
        'street',
        'city',
        'postcode',
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
     * Gets the User this model belongs to.
     *
     * @return Relationship
     */
    public function users(){
        return $this->belongsTo('User');
    }
    
    /**
     * Gets the Sessions that are related to this model.
     *
     * @return Relationship
     */
    public function sessions(){
        return $this->hasMany('Session');
    }
}
