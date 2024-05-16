<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $fillable = [
        'cars_id','sensors', 'control_parking', 'auto_temp', 'wireless_co', 'conditioner', 'navigator'
        ,'map','camera','kids_chair','spare_tire'
        , 'bluetooth', 'rear_camera', 'usb', 'safety_aribag','gps','status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'features';
}
