<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'p_transaction_id', 'p_user_id', 'p_money', 'p_transaction_code', 'p_note', 'p_vnp_response_code', 'p_code_vnpay', 'p_code_bank', 'p_time'
    ];
    protected $primaryKey = 'id';
    protected $table = 'payments';

    public function user()
    {
        return $this->belongsTo('App\User', 'p_user_id', 'id');
    }
    public function car()
    {
        return $this->belongsTo('App\Models\Cars', 'p_transaction_id', 'id');
    }
}
