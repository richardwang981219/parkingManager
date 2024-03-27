<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Parking extends Model
{
    //
    protected $table = 'parking';
    protected $fillable = ['id','user_id','vehicle_id','time','from','to','position'];
    public $timestamps = FALSE;

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
