<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $mark = Mark::query();
        if(!empty($request->searchname))
            $mark->where('denomination', 'LIKE', "%$request->searchname%");
        if(!empty($request->searccountry))
            $mark->where('country_id', $request->searccountry);
        if(!empty($request->aftereyear))
            $mark->where('year', '>=', $request->aftereyear);
        if(!empty($request->beforeyear))
            $mark->where('year', '<=', $request->beforeyear);
        if(!empty($request->searchname))
            $mark->orWhere('features', 'LIKE', "%$request->searchname%");
        $markres = $mark->get()->all();

        if(!$markres){
            abort(404,'Coin not found!');
        }
        foreach ($markres as $item){
            $item->country;
            $item->images;
        }
        return $markres;
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
        $mark = new Mark();
        $mark->year = $data['year'];
        $mark->country_id = null;
        if(!empty($data["country"]))
            $mark->country_id = $data["country"]["id"];
        else
            $mark->country_id = null;
        $mark->denomination = $data['denomination'];
        $mark->material = $data['material'];
        $mark->circulation = $data['circulation'];
        $mark->features = $data['features'];
        $mark->save();
        // достать все id и в сводную таблицу засинхронит с новой монетой
        $image_id_array = [];
        foreach ($data['images'] as $image) {
            $image_id_array[$image['id']] = ['mark_id' => $mark->id];
        }
        $mark->images()->sync($image_id_array);
        return response($mark->id,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = Mark::find($id);
        if(!$mark){
            abort(404,'Coin not found!');
        }
        $mark->country;
        $mark->images;
        return $mark;
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
        $mark = Mark::find($id);
        if(!$mark)
            return response('Not found',404);
        $mark->year = $data['year'];
        if(!empty($data["country"]))
            $mark->country_id = $data["country"]["id"];
        else
            $mark->country_id = null;
        // достать все id и в сводную таблицу засинхронит с новой монетой
        $image_id_array = [];
        foreach ($data['images'] as $image) {
            $image_id_array[$image['id']] = ['mark_id' => $mark->id];
        }
        $mark->images()->sync($image_id_array);
        $mark->denomination = $data['denomination'];
        $mark->material = $data['material'];
        $mark->circulation = $data['circulation'];
        $mark->features = $data['features'];
        $mark->save();
        return response($mark->id,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::find($id);
        if(!$mark)
            return response('Not found',404);
        $mark->delete();
        return response('Success',200);
    }
}
