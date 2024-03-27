<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //

    protected $table = 'places';
    protected $fillable = ['id','place','state'];
    public $timestamps = FALSE;

}
