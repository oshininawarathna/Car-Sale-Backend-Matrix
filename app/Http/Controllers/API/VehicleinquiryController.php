<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleinquiryRequest;
use App\Mail\TestMail;
use App\Models\Vehicle_Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VehicleinquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle_Inquiry = Vehicle_Inquiry::all();
        return response()->json([
            'status' => true,
            'posts' => $vehicle_Inquiry
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
    public function store(StoreVehicleinquiryRequest $request)
    {
        $vehicle_Inquiry = Vehicle_Inquiry::create($request->all());
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'cus_req'=>$request->cus_req,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'subject' => "Vehicle Inquiry Session Logged",
            'mail' => 'emails.Vehicleinquiry',
        ];
        Mail::to($data['email'])->send(new TestMail($data));
        return response()->json([
            'status' => true,
            'message' => "Inquiry Logged",
            'post' => $vehicle_Inquiry
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle_Inquiry  $vehicle_Inquiry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Vehicle_Inquiry::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle_Inquiry  $vehicle_Inquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle_Inquiry $vehicle_Inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle_Inquiry  $vehicle_Inquiry
     * @return \Illuminate\Http\Response
     */
    public function update(StoreVehicleinquiryRequest $request, Vehicle_Inquiry $vehicle_inquiry)
    {
        $vehicle_inquiry->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Inquiry details updated Successfully!",
            'post' => $vehicle_inquiry
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle_Inquiry  $vehicle_Inquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle_Inquiry $vehicle_inquiry)
    {
        $vehicle_inquiry->delete();
        return response()->json([
            'status' => true,
            'message' => "Inquiry Deleted!"
        ], 200);
    }
}
