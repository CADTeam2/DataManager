<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sessionID', 'question', 'priority',
    ];
    
    public function session(){
        return $this->belongsTo(Session::class);
    }
}
