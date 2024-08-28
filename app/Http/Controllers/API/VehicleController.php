<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::all();
        return response()->json([
            'status' => true,
            'count' => count($vehicle),
            'Vehicle' => $vehicle
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
    public function store(StoreVehicleRequest $request)
    {
        $v_image = new Vehicle();
        $v_image->brand=$request->brand;
        $v_image->model=$request->model;
        $v_image->make=$request->make;
        $v_image->year_manufacture=$request->year_manufacture;
        $v_image->year_registration=$request->year_registration;
        $v_image->ownership=$request->ownership;
        $v_image->chassis_no=$request->chassis_no;
        $v_image->fuel_type=$request->fuel_type;
        $v_image->reg_no=$request->reg_no;
        $v_image->mileage=$request->mileage;
        $v_image->remarks=$request->remarks;
        $v_image->cost=$request->cost;
        $v_image->unit_price=$request->unit_price;
        $v_image->margin=$request->margin;
        $v_image->availability=$request->availability;

        $filename = Null;
        if($request->hasFile('v_image')){
            $filename=$request->file('v_image')->store('vehicle','public');  
        }

        $v_image->v_image=$filename;
        $result=$v_image->save();
        $returnvalue = response()->json(['success'=>false]);

        if($result){
            $returnvalue = response()->json(['success'=>true,'message'=>"Vehicle Created Successfully!"]);
        }
        return $returnvalue;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Vehicle::find($id); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Vehicle details updated Successfully!",
            'post' => $vehicle
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->json([
            'status' => true,
            'message' => "Vehicle Removed Successfully!"
        ], 200);
    }
}