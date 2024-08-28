<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends BaseController
{
    /**
     * Login api
     * 
     * @return \\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        } 
        else if(Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])){
            $admin = Auth::user();
            $success['first_name'] =  $admin->first_name;
            $success['last_name'] =  $admin->last_name;
            $success['email'] =  $admin->email;
            // $token = Auth::attempt($admin);
            // if (!$token) {
            //     return response()->json([
            //         'status' => 'error',
            //         'message' => 'Unauthorized',
            //     ], 401);
            // }
            // $admin = Auth::user();
            // return response()->json([
            //         'status' => 'success',
            //         'user' => $admin,
            //         'authorisation' => [
            //             'token' => $token,
            //             'type' => 'bearer',
            //         ]
            //     ]);

            return $this->sendResponse($success, 'User login success.'); 
        }
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
    public function index()
    {
        $admin = Admin::all();
        return response()->json([
            'admins' => $admin
        ]);
    
    }
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return $this->sendResponse([], 'Request deleted successfully.');
    
    }

}