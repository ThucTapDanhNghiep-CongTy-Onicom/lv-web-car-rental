<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $fillable=['users_id','cars_id','taxes','address_on' 
                        ,'address_off','time_start','time_end' 
                        ,'date_start','date_end','status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function cars()
    {
        return $this->hasOne('App\Models\Cars', 'id', 'car_id');
    }
}
