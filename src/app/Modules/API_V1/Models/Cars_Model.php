<?php

namespace App\Modules\API_V1\Models;

use Illuminate\Database\Eloquent\Model;
use App\Modules\API_V1\Models\Review_Model;

class Cars_Model extends Model
{

    protected $table = "cars";
    protected $guarded = [];

    public function review_info()
    {
        return $this->hasOne('App\Modules\API_V1\Models\Review_Model', 'id', 'review_id');
    }
    public function render()
    {
        return $this->hasOne('App\Modules\API_V1\Models\Renders_Model', 'id', 'renders_id');
    }
}
