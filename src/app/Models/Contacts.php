<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = ['id', 'name', 'email', 'message'];
    protected $primaryKey = 'id';
    protected $table = 'contacts';
}
