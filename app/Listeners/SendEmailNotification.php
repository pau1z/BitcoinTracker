<?php

namespace App\Listeners;

use App\Events\PriceUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Mail;
use App\Mail\PriceIncreased;
use App\Models\Subscriber;

class SendEmailNotification
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
     * @param  \App\Events\PriceUpdated  $event
     * @return void
     */
    public function handle(PriceUpdated $event)
    {
        $currentPrice = $event->getPrice();

        $subscribers = Subscriber::where('price', '<', $currentPrice)
                            ->orderBy('created_at')
                            ->get();

        foreach ($subscribers as $subscriber) 
        {
            Mail::to($subscriber->email)->send(new PriceIncreased($subscriber->price));
        }

        // !!! do not return false or you will stop other listeners !!!
    }
}
