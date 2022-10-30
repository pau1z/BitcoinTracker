<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Ticker;

class SymbolController extends Controller
{
    /**
     * Return historic data for specific symbol
     *
     * @return Json
     */
    public function get()
    {
        $prices = [];
     
        foreach (Ticker::all() as $key => $ticker) 
        {
            $prices[$key]['price'] = $ticker->last_price;
            $prices[$key]['at'] = $ticker->created_at;
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
        return 0;
    }
}
