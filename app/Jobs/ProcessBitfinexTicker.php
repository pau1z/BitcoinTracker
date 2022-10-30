<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Ticker;
use App\Exchanges\Bitfinex;

class ProcessBitfinexTicker implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    const SYMBOL_BTC_USD = 'BTCUSD';
    
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // ...
    }

    /**
     * Execute the job.
     *
     * @param  App\Exchanges\Bitfinex  $exchange
     * @return void
     */
    public function handle(Bitfinex $exchange)
    {
        $bitfinexTicker = $exchange->fetchTicker(self::SYMBOL_BTC_USD);
        
        $ticker = new Ticker;
        $ticker->bid = $bitfinexTicker->bid;
        $ticker->ask = $bitfinexTicker->ask;
        $ticker->low = $bitfinexTicker->low;
        $ticker->high = $bitfinexTicker->high;
        $ticker->last_price = $bitfinexTicker->last_price;
        $ticker->save();

        if (!isset($ticker->id)) 
        {
            throw new \Exception('Ticker isnt inserted. Please check!', 500);
        }

        // todo: trigger event to notify users
        // todo: check the subscribers is it needed to notify someone
        
        var_dump($ticker->id);

        return $ticker->id;
    }
}
