<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();

        return response()->json([
            'status'=>true,
            'count' => count($staff),
            'staff'=>$staff
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
    public function store(StoreStaffRequest $request)
    {
    //    $staff = Staff::create($request->all());

    //    return response()->json([
    //         'status'=>true,
    //         'message'=>"Staff Created Successfully!",
    //         'staff'=>$staff
    //    ],200);


    $image = new Staff();
    $image->first_name=$request->first_name;
    $image->last_name=$request->last_name;
    $image->ph_no=$request->ph_no;
    $image->address=$request->address;
    $image->nic=$request->nic;
    $image->email=$request->email;
    $image->gender=$request->gender;
    $image->d_o_b=$request->d_o_b;
    $image->position=$request->position;
    $image->shift=$request->shift;
    $image->salary=$request->salary;
    
    $filename=NULL;
    if($request->hasFile('image')){
        $filename=$request->file('image')->store('staff','public');         
    }

    $image->image=$filename;
    $result=$image->save();
    $returnvalue = response()->json(['success'=>false]);

    if($result){
        $returnvalue = response()->json(['success'=>true,'message'=>"Staff Created Successfully!"]);
    }

    return $returnvalue;



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Staff::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStaffRequest $request, Staff $staff)
    {
        $staff->update($request->all());

        return response()->json([
            'status'=>true,
            'message'=>'Staff Updated Successfully!',
            'staff'=>$staff
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return response()->json([
            'status'=>true,
            'message'=>'Staff Deleted Successfully!',
            ],200);

    }
}
