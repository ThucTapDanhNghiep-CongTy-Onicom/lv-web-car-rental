<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historys extends Model
{
    protected $fillable=['users_id','bookings_id','status'];
    protected $primaryKey = 'id';
    protected $table = 'historys';

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
    public function booking()
    {
        return $this->belongsTo('App\Models\Bookings', 'bookings_id', 'id');
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Cars', 'cars_id', 'id');
    }
}
