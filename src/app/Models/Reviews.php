<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable=['users_id','cars_id','rate','review','reply','status'];
    protected $primaryKey = 'id';
    protected $table = 'reviews';

    public function user_info()
    {
        return $this->hasOne('App\User', 'id', 'users_id');
    }

    public static function getAllReview()
    {
        return Reviews::with('user_info')->paginate(10);
    }
    public static function getAllUserReview()
    {
        return Reviews::where('users_id', auth()->user()->id)->with('user_info')->paginate(10);
    }
    public function car_review()
    {
        return $this->hasOne('App\Models\Cars', 'id', 'cars_id');
    }
}
