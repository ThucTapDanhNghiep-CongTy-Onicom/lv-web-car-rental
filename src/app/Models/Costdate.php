<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costdate extends Model
{
    protected $fillable = [
        'one_to_three','five_online','ten_to_fourteen','more_fifteen','price_month','cars_id'
     ];
     protected $primaryKey = 'id';
     protected $table = 'tariffs';
}
