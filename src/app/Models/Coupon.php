<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=['users_id','zipcode','discount_sale' ,'time_start','time_end','status'];
    protected $primaryKey = 'id';
    protected $table = 'vouchers';
}
