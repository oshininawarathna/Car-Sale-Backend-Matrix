<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $table='vehicles';
    protected $fillable = [
        'brand', 
        'model', 
        'make', 
        'year_manufacture', 
        'year_registration', 
        'ownership', 
        'chassis_no', 
        'fuel_type', 
        'reg_no', 
        'mileage', 
        'remarks', 
        'cost', 
        'unit_price', 
        'margin',
        'availability',
        'v_image'
    ];
}
