<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reders extends Model
{
    protected $fillable=['manu_name','description','photo','feature'];
    protected $primaryKey = 'id';
    protected $table = 'renders';
}
