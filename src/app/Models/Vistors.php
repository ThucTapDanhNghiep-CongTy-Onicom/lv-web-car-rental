<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vistors extends Model
{
    protected $fillable=['ip_address','date_vistors'];
    protected $primaryKey = 'id';
    protected $table = 'vistors';
}
