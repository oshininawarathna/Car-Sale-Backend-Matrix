<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'trans_id',
        'brand', 
        'model', 
        'make',
        'year_manufacture',
        'year_registration',
        'chassis_no',
        'unit_price',
        'query'
    ];
}
