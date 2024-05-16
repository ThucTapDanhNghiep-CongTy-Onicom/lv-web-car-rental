<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['users_id', 'cars_id', 'comment', 'status', 'replied_comment'];
    protected $primaryKey = 'id';
    protected $table = 'comments';
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Cars', 'cars_id', 'id');
    }
}
