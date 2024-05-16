<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtpEmail extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'email', 'otp', 'start_time','end_time'
    ];
    protected $primaryKey = 'id';
    protected $table = 'otp_email';
}
