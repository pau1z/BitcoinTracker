<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticker;
use App\Models\Subscriber;

class SymbolController extends Controller
{
    /**
     * Return historic data for specific symbol
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $prices = [];

        // todo: add two params from & to
     
        foreach (Ticker::all() as $key => $ticker) 
        {
            $prices[$key]['price'] = $ticker->last_price;
            $prices[$key]['at'] = $this->formatDateToTimestamp($ticker->created_at);
            $prices[$key]['at_human'] = $this->formatTickerDate($ticker->created_at);
        }
        
        return response()->json($prices);
    }

    /**
     * Subscribe a client for movement in price
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $input = $request->all();

        if (!isset($input['email'])) 
        {
            throw new \Exception('Email must be provided', 400);
        }

        // todo: check for valid mail
        
        if (!isset($input['price'])) 
        {
            throw new \Exception('Price must be provided', 400);
        }

        // todo: better validation

        $subscriber = new Subscriber;
        $subscriber->email = $input['email'];
        $subscriber->price = $input['price'];
        $subscriber->save();

        if (!isset($subscriber->id)) 
        {
            throw new \Exception('Subscriber cannot be inserted. Please check!', 500);
        }

        return response()->json(['status' => true]);
    }


    public function formatDateToTimestamp(string $date)
    {
        $date = new \DateTime($date);

        return $date->getTimestamp();
    }

    private function formatTickerDate(string $date) 
    {
        return date_format(date_create($date),"Y-m-d H:i:s");
    }


}
