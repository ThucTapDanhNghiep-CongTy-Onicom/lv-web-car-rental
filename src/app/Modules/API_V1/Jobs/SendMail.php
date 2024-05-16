<?php

namespace App\Modules\API_V1\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Log;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sento;
    protected $subject;

    public function __construct($sento,$subject)
    {
        $this->sento = $sento;
        $this->subject = $subject;
    }

    /**
     * Execute the job.
     *
     * @param  AudioProcessor  $processor
     * @return void
     */
    public function handle()
    {
        //Mail::to($recipient)->send(new OrderShipped($this->order));
        //$email = "ngodinhluan1@gmail.com";
        $email = $this->sendto;
        Mail::send('API::email.verify', [
            'email' => $email,
            'confirmation_code' => "code123521" //$confirmation_code
        ], function ($message) use ($email) {
            $message->from('noreply@visithcmc.vn', 'Test');
            $message->to($email)
                ->subject($this->subject);
        });
        Log::info('Dispatched email ' . $email);
    }
}