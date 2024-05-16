<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = [
        'name', 'description', 'photo', 'seat', 'color', 'make','power','gearbox'
        ,'luggage','fuel','service_charge','insurance_fees'
        , 'price', 'discount', 'address', 'latitude','longitude','terms_of_use', 'rules'
        , 'users_id', 'categories_id', 'renders_id', 'city_id'
        , 'start_date', 'end_date', 'start_time', 'end_time'
        , 'range_of_vehicle', 'status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'cars';

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id', 'id');
    }
    public function catagory()
    {
        return $this->belongsTo('App\Models\Categories', 'categories_id', 'id');
    }
    public function render()
    {
        return $this->hasOne('App\Models\Reders', 'id', 'renders_id');
    }
    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id', 'id');
    }
    public function city()
    {
        return $this->hasOne('App\Models\City', 'id', 'city_id');
    }
    public function rel_prods()
    {
        return $this->hasMany('App\Models\Cars', 'renders_id', 'renders_id')->orderBy('id', 'DESC')->limit(3);
    }
}
