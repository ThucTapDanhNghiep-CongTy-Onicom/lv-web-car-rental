<?php

namespace App\Modules\API_V1\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Log;
use App\Modules\API_V1\Models\Ask_Model;

class TestQueue implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    

    //protected $sento;
    //protected $subject;

    public function __construct()
    {
        //$this->onQueue('processing');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ask = new Ask_Model;
        $ask->users_id =1;
        $ask->message ="ngoluan";
        $ask->language_id =1;
        $ask->status =1;
        $ask->save();
    }
}