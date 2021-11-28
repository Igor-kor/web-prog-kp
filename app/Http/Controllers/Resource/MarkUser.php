<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarkUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mark = \App\Models\MarkUser::get();
        if(!$mark){
            abort(404,'Coin not found!');
        }
        foreach ($mark as $item){
            $item->mark;
            $item->mark->country;
            $item->mark->images;
        }
        return $mark;
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
        $mark = new \App\Models\MarkUser();
        if(!$mark)
            return response('Not found',404);
        if(!empty ( $data['safety']))
            $mark->safety = $data['safety'];
        if(!empty ( $data['description']))
            $mark->description = $data['description'];
        $mark->mark_id = $data['mark']['id'];
        $mark->save();
        return response($mark,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mark = \App\Models\MarkUser::find($id);
        if(!$mark){
            abort(404,'Coin not found!');
        }
        $mark->mark->country;
        $mark->mark->images;
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
        $mark = \App\Models\MarkUser::find($id);
        if(!$mark)
            return response('Not found',404);
        if(!empty ( $data['safety']))
            $mark->safety = $data['safety'];
        if(!empty ( $data['description']))
            $mark->description = $data['description'];
        $mark->save();
        return response($mark,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = \App\Models\MarkUser::find($id);
        if(!$mark)
            return response('Not found',404);
        $mark->delete();
        return response('Success',200);
    }
}
