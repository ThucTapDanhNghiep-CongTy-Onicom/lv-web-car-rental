<?php

namespace App\Modules\API_V1\Models;

use Illuminate\Database\Eloquent\Model;

class Ask_Model extends Model
{

    protected $table = "ask";
    protected $guarded = [];


//    public function scopeGetAll($query)
//    {
//        return $query->whereIn("status", [0, 1]);
//    }
}
