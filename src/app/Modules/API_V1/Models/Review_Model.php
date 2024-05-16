<?php

namespace App\Modules\API_V1\Models;

use Illuminate\Database\Eloquent\Model;

class Review_Model extends Model
{

    protected $table = "reviews";
    protected $guarded = [];

    public function user_info()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function car_info()
    {
        return $this->hasOne('App\Modules\API_V1\Models\Cars_Model', 'id', 'car_id');
    }

    public static function getAllReview()
    {
        return Review_Model::select('reviews.car_id',
            'reviews.rate')->get();
    }
}
