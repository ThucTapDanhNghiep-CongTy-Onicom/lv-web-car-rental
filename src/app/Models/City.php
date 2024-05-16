<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['region_id','title','status'];
    protected $primaryKey = 'id';
    protected $table = 'city';

    
}
