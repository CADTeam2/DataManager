<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street', 'city', 'postcode', 'contactNo', 'email',
    ];
    
    public function sessions(){
        return $this->hasmany(Session::class);
    }
}
