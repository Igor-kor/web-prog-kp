<?php

namespace App\Http\Controllers\Coin;

use App\Http\Controllers\Controller;


class CoinsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCoins(){
        return view('coins.coins');
    }

}
