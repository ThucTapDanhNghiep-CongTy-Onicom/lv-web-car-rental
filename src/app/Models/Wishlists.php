<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    protected $fillable=['cars_id','users_id'];
    protected $primaryKey = 'id';
    protected $table = 'wishlists';
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
    public function car()
    {
        return $this->hasOne('App\Models\Cars', 'id', 'cars_id');
    }
    public function render()
    {
        return $this->hasOne('App\Models\Reders', 'id', 'renders_id');
    }
}
