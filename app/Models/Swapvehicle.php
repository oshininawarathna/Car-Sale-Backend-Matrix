<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swapvehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact',
        'email',
        'profession',
        'address',
        'cus_make',
        'cus_brand',
        'cus_model',
        'cus_year_manufacture',
        'year_registration',
        'cus_ownership',
        'chassis_no',
        'cus_fuel_type',
        'mileage',
        'remarks',
        'brand',
        'model',
        'make',
        'ownership',
        'year_manufacture',
        'fuel_type',
        'decision'
    ];
}
