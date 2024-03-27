<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //

    protected $table = 'vehicle';
    protected $fillable = ['id', 'CarModel','Capacity'];
    public $timestamps = FALSE;
    // Get the entries for a specific mood.


    // Clear moods cache upon modifying a mood entry

}
