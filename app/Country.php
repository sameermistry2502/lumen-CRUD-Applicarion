<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Country extends Model 
{
    protected $table = 'countries';
   
     protected $fillable = [
        'iso', 'name ', 'nicename','iso3','numcode','phonecode'
    ];

    protected $guarded = ['created_at','updated_at'];

    
}
