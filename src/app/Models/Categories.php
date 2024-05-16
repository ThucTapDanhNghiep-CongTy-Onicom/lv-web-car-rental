<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable=['categories_name'];
    protected $primaryKey = 'id';
    protected $table = 'categories';
}
