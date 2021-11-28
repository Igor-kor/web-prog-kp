<?php

namespace App\Http\Controllers\Coin;

use App\Http\Controllers\Controller;
use App\Models\Coin;


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

    public function getCoin($id){
        $coin = Coin::find($id);
        if(!$coin){
            abort(404,'Coin not found!');
        }
        return view('coins.coin_page',['coin'=>$coin]);
    }

}
