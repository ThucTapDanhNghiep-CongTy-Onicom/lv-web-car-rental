<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipts extends Model
{
    protected $fillable=['bookings_id','users_id','cars_id','renders_id','status'];
    protected $primaryKey = 'id';
    protected $table = 'receipts';
}
