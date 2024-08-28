<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\LendedController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\VehicleController;
use App\Http\Controllers\API\StaffController;
use App\Http\Controllers\API\VehicleinquiryController;
use App\Http\Controllers\Api\TestdriveController;
use App\Http\Controllers\API\SwapvehicleController;
use App\Http\Controllers\API\CurrentvisitController;
use App\Http\Controllers\API\MaintenanceController;

/* Used for the Login and Registration of the Admin*/
Route::apiResource('register', RegisterController::class);
Route::apiResource('login', LoginController::class);


/* CRUDS */
Route::apiResource('lendeds', LendedController::class);
Route::apiResource('transactions', TransactionController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('vehicles', VehicleController::class);
Route::apiResource('staff', StaffController::class);
Route::apiResource('vehicle_inquiry', VehicleinquiryController::class);
Route::apiResource('testdrive', TestdriveController::class);
Route::apiResource('swapvehicle', SwapvehicleController::class);
Route::apiResource('messages', MessageController::class);
Route::apiResource('currentvisits',CurrentvisitController::class);
Route::apiResource('maintenances',MaintenanceController::class);
