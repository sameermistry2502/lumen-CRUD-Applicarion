<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class City extends Model 
{
    protected $table = 'cities';
   
     protected $fillable = [
        'city_name ', 'state_id' ,'country_id'
    ];

    public function getState(){
    	return $this->belongsTo('App\State','state_id','id')->select('id','state_name');
    }
    public function getCountry(){
    	return $this->belongsTo('App\Country','country_id','id')->select('id','name');
    }
}
