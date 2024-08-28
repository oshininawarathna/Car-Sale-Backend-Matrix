<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testdrive extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'contact',
        'email',
        'profession',
        'address',
        'cus_req',
        'make',
        'brand',
        'model',
        'year_manufacture'
    ];
}
