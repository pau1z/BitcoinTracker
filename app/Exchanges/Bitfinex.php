<?php

namespace App\Exchanges;

use App\Exchanges\ExchangeInterface;
use Illuminate\Support\Facades\Http;

class Bitfinex implements ExchangeInterface
{
    const API_ENDPOINT = 'https://api.bitfinex.com/v1/';
    const PUBLIC_TICKER = 'pubticker/';

    public function fetchTicker(string $symbol)
    {
        $response = Http::get(self::API_ENDPOINT.self::PUBLIC_TICKER.$symbol);

        if (!$response->ok()) 
        {
            throw new \Exception('There is a problem fetching '.$symbol.' ticker');
        }

        return $response->object();
    }
}