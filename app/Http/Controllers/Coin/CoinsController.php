<?php

namespace App\Http\Controllers\Coin;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\CoinUser;


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

    public function getCoinUsers($id){
        $coin = CoinUser::query()->where('coin_id',$id)->get();
        if(!$coin){
            abort(404,'Coin not found!');
        }
        foreach ($coin as $item){
            $item->coin;
            $item->coin->country;
            $item->coin->images;
        }
        return view('coins.coins_allusers_page',['coins'=>$coin]);
    }

}
