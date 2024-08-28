<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testdrive;
use App\Mail\TestMail;
use App\Http\Requests\StoreTestdriveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestdriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testdrive = Testdrive::all();
        return response()->json([
            'status' => true,
            'posts' => $testdrive
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
    public function store(StoreTestdriveRequest $request)
    {
        $testdrive = Testdrive::create($request->all());
        $data=[
            'name'=>$request->name,
            'email'=>$request->email,
            'cus_req'=>$request->cus_req,
            'brand'=>$request->brand,
            'model'=>$request->model,
            'year_manufacture'=>$request->year_manufacture,
            'subject' => "Vehicle Test Drive Session Logged",
            'mail' => 'emails.Testdrive',
        ];
        Mail::to($data['email'])->send(new TestMail($data));
        return response()->json([
            'status' => true,
            'message' => "Test Session Logged",
            'post' => $testdrive
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testdrive  $testdrive
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Testdrive::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testdrive  $testdrive
     * @return \Illuminate\Http\Response
     */
    public function edit(Testdrive $testdrive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testdrive  $testdrive
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTestdriveRequest $request, Testdrive $testdrive)
    {
        $testdrive->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Test Session details updated Successfully!",
            'post' => $testdrive
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testdrive  $testdrive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testdrive $testdrive)
    {
        $testdrive->delete();
        return response()->json([
            'status' => true,
            'message' => "Test Session Deleted!"
        ], 200);
    }
}
