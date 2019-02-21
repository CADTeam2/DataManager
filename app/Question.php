<?php

namespace App;

use Session;
use User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    /**
     * The table containing the Questions.
     *
     * @var string
     */
    protected $table = "Questions";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sessionID',
        'userID',
        'question',
        'priority',
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
     * Gets the Session this model belongs to.
     *
     * @return Relationship
     */
    public function session(){
        return $this->belongsTo('Session');
    }

    /**
     * Gets the User this model belongs to.
     *
     * @return Relationship
     */
    public function user(){
        return $this->belongsTo('User');
    }
}
