<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=['name','email','password','email_verified_at','remember_token'];
    protected $primaryKey = 'id';
    protected $table = 'tlb_admin';
}
