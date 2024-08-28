<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCurrentvisitRequest;
use App\Models\Currentvisit;
use Illuminate\Http\Request;

class CurrentvisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentvisit= Currentvisit::all();
        return response()->json([
            'status'=>true,
            'count'=>count($currentvisit),
            'currentvisits'=>$currentvisit
        ]);
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
    public function store(StoreCurrentvisitRequest $request)
    {
       $currentvisit = Currentvisit::create($request->all());

       return response()->json([
        'status'=>true,
        'message'=>"Current visit Created Successfully",
        'currentvisits'=> $currentvisit
       ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currentvisit  $currentvisit
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Currentvisit::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currentvisit  $currentvisit
     * @return \Illuminate\Http\Response
     */
    public function edit(Currentvisit $currentvisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currentvisit  $currentvisit
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCurrentvisitRequest $request, Currentvisit $currentvisit)
    {
        $currentvisit->update($request->all());
        return response()->json([
            'status'=>true,
            'message'=>"Current visit Updated Successfully",
            'currentvisits'=> $currentvisit
           ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currentvisit  $currentvisit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currentvisit $currentvisit)
    {
        $currentvisit->delete();

        return response()->json([
            'status'=>true,
            'message'=>"Current visit Deleted Successfully",
            'currentvisits'=> $currentvisit
           ],200);
       

    }
}
