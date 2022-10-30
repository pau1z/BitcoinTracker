<?php

namespace App\Exchanges;

interface ExchangeInterface
{
    public function fetchTicker(string $symbol);
}