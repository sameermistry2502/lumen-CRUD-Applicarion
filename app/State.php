<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class State extends Model 
{
    protected $table = 'states';
   
    protected $fillable = [
        'state_name ', 'country_id'
    ];

    public function goForCountry()
    {
    	return $this->belongsTo('App\Country','country_id','id')->select('id','name');
    }
}
