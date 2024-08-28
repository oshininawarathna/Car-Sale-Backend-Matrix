<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Swapvehicle;
use App\Http\Requests\StoreSwapvehicleRequest;
use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class SwapvehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $swapvehicle = Swapvehicle::all();
        return response()->json([
            'status' => true,
            'count' => count($swapvehicle),
            'posts' => $swapvehicle
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
    public function store(StoreSwapvehicleRequest $request)
    {
        $swapvehicle = Swapvehicle::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Swap Details Recorded Successfully!",
            'post' => $swapvehicle
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Swapvehicle  $swapvehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Swapvehicle::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Swapvehicle  $swapvehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Swapvehicle $swapvehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Swapvehicle  $swapvehicle
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSwapvehicleRequest $request, Swapvehicle $swapvehicle)
    {
        $swapvehicle->update($request->all());
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'cus_brand'=>$request->cus_brand,
            'cus_model'=>$request->cus_model,
            'cus_year_manufacture'=>$request->cus_year_manufacture,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'subject'=> "Swap Vehicle Deal Accepted",
            'mail'=> "emails.Swapvehicleaccept"
        ];
        Mail::to($data['email'])->send(new TestMail($data));
        return response()->json([
            'status' => true,
            'message' => "Swap details updated Successfully!",
            'post' => $swapvehicle
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Swapvehicle  $swapvehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Swapvehicle $swapvehicle, Request $request)
    {
        $swapvehicle->delete();
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'cus_brand'=>$request->cus_brand,
            'cus_model'=>$request->cus_model,
            'cus_year_manufacture'=>$request->cus_year_manufacture,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'subject'=> "Swap Vehicle Deal Rejected",
            'mail'=> "emails.Swapvehicledecline",
        ];
        Mail::to($data['email'])->send(new TestMail($data));
        return response()->json([
            'status' => true,
            'message' => "Swap Details Removed!"
        ], 200);
    }
}
