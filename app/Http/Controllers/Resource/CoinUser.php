<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoinUser extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->user_id))
            $coin = \App\Models\CoinUser::get()->where("user_id", "=", $request->user_id);
        else
            $coin = \App\Models\CoinUser::get()->where("user_id", "=", auth()->id());
        if(!$coin){
            abort(404,'Coin not found!');
        }
        foreach ($coin as $item){
            $item->coin;
            $item->coin->country;
            $item->coin->images;
        }
        return $coin;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->get('params');
        $coin = new \App\Models\CoinUser();
        if(!$coin)
            return response('Not found',404);
        if(!empty ( $data['safety']))
            $coin->safety = $data['safety'];
        if(!empty ( $data['description']))
            $coin->description = $data['description'];
        $coin->coin_id = $data['coin']['id'];
        $coin->user_id = auth()->id();
        $coin->save();
        return response($coin,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coin = \App\Models\CoinUser::find($id);
        if(!$coin){
            abort(404,'Coin not found!');
        }
        $coin->coin->country;
        $coin->coin->images;
        return $coin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->get('params');
        $coin = \App\Models\CoinUser::find($id);
        if(!$coin)
            return response('Not found',404);
        if(!empty ( $data['safety']))
            $coin->safety = $data['safety'];
        if(!empty ( $data['description']))
            $coin->description = $data['description'];
        $coin->save();
        return response($coin,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coin = \App\Models\CoinUser::find($id);
        if(!$coin)
            return response('Not found',404);
        $coin->delete();
        return response('Success',200);
    }
}
