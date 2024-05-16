<?php

namespace App\Listeners;

use App\Events\UserReferred;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RewardUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserReferred  $event
     * @return void
     */
    public function handle(UserReferred $event)
    {
        $referral = \App\Models\ReferralLink::find($event->referralId);
        if (!is_null($referral)) {
            \App\Models\ReferralRelationship::create(['referral_link_id' => $referral->id, 'user_id' => $event->user->id]);
            // Tặng thưởng cho cả người share link và người sử dụng link
            if ($referral->program->name === 'Bonus Credits') {
                // Người chia sẻ link
                $provider = $referral->user;
                $provider->addCredits(15);
                // Người sử dụng link
                $user = $event->user;
                $user->addCredits(20);
            }
        }
    }
}
