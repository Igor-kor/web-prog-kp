<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Coin;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class CoinController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        $coin = Coin::get();
//
//        if(!empty($request->searchname))
        $coin = Coin::query();
        if(!empty($request->searchname))
            $coin->where('denomination', 'LIKE', "%$request->searchname%");
        if(!empty($request->searccountry))
            $coin->where('country_id', $request->searccountry);
        if(!empty($request->aftereyear))
            $coin->where('year', '>=', $request->aftereyear);
        if(!empty($request->beforeyear))
            $coin->where('year', '<=', $request->beforeyear);
        if(!empty($request->searchname))
            $coin->orWhere('features', 'LIKE', "%$request->searchname%");
        $coinresponse = $coin->get()->all();

        if (!$coinresponse) {
            abort(404, 'Coin not found!');
        }
        foreach ($coinresponse as $item) {
            $item->country;
            $item->images;
        }
        return $coinresponse;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->get('params');
        $coin = new Coin;
        $coin->year = $data['year'];
        if (!empty($data["country"]))
            $coin->country_id = $data["country"]["id"];
        else
            $coin->country_id = null;
        $coin->denomination = $data['denomination'];
        $coin->material = $data['material'];
        $coin->diameter = $data['diameter'];
        $coin->coin_weight = $data['coin_weight'];
        $coin->circulation = $data['circulation'];
        $coin->edge = $data['edge'];
        $coin->features = $data['features'];
        $coin->save();
        // достать все id и в сводную таблицу засинхронит с новой монетой
        $image_id_array = [];
        foreach ($data['images'] as $image) {
            $image_id_array[$image['id']] = ['coin_id' => $coin->id];
        }
        $coin->images()->sync($image_id_array);
        return response($coin->id, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coin = Coin::find($id);
        if (!$coin) {
            abort(404, 'Coin not found!');
        }
        $coin->country;
        $coin->images;
        return $coin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->get('params');
        $coin = Coin::find($id);
        if (!$coin)
            return response('Not found', 404);
        $coin->year = $data['year'];
        if (!empty($data["country"]))
            $coin->country_id = $data["country"]["id"];
        else
            $coin->country_id = null;
        // достать все id и в сводную таблицу засинхронит с новой монетой
        $image_id_array = [];
        foreach ($data['images'] as $image) {
            $image_id_array[$image['id']] = ['coin_id' => $coin->id];
        }
        $coin->images()->sync($image_id_array);
        $coin->denomination = $data['denomination'];
        $coin->material = $data['material'];
        $coin->diameter = $data['diameter'];
        $coin->coin_weight = $data['coin_weight'];
        $coin->circulation = $data['circulation'];
        $coin->edge = $data['edge'];
        $coin->features = $data['features'];
        $coin->save();
        return response($coin->id, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coin = Coin::find($id);
        if (!$coin)
            return response('Not found', 404);
        $coin->delete();
        return response('Success', 200);
    }
}
