<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electri extends Model
{
    //    //
    protected $table = 'electricity';
    protected $fillable = ['id', 'current','total'];
    public $timestamps = FALSE;
}
