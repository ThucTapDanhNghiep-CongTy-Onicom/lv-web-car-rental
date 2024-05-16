<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable=['title','photo'];
    protected $primaryKey = 'id';
    protected $table = 'region';

    
}
