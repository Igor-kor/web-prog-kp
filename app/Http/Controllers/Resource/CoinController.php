<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coin = Coin::get();
        if(!$coin){
            abort(404,'Coin not found!');
        }
        foreach ($coin as $item){
            $item->country;
            $item->images;
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
        $coin = new Coin;
        $coin->year = $data['year'];
        if(!empty($data["country"]["name"]))
            $coin->country_id = Country::where('name', '=', $data["country"]["name"])->firstOrFail()->id;
        $coin->denomination = $data['denomination'];
        $coin->material = $data['material'];
        $coin->diameter = $data['diameter'];
        $coin->coin_weight = $data['coin_weight'];
        $coin->circulation = $data['circulation'];
        $coin->edge = $data['edge'];
        $coin->features = $data['features'];
        $coin->save();
        foreach ($data['images'] as $image){
            DB::table('coin_image')->insert(['image_id'=>$image['id'],'coin_id'=>$coin->id]);
        }
        return response($coin->id,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coin = Coin::find($id);
        if(!$coin){
            abort(404,'Coin not found!');
        }
        $coin->country;
        $coin->images;
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
        $coin = Coin::find($id);
        if(!$coin)
            return response('Not found',404);
        $coin->year = $data['year'];
        if(!empty($data["country"]["name"]))
            $coin->country_id = Country::where('name', '=', $data["country"]["name"])->firstOrFail()->id;
        else
            $coin->country_id = null;
        foreach ($data['images'] as $image){
            $find = DB::table('coin_image')->select('*')->where('image_id','=',$image['id'])->where('coin_id','=', $id)->get()->toArray();
            if(count($find) == 0){
                DB::table('coin_image')->insert(['image_id'=>$image['id'],'coin_id'=>$id]);
            }
        }
        $coin->denomination = $data['denomination'];
        $coin->material = $data['material'];
        $coin->diameter = $data['diameter'];
        $coin->coin_weight = $data['coin_weight'];
        $coin->circulation = $data['circulation'];
        $coin->edge = $data['edge'];
        $coin->features = $data['features'];
        $coin->save();
        return response($coin->id,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
