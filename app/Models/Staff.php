<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable =['first_name', 'last_name', 'ph_no', 'address', 'nic', 'email', 'gender', 'd_o_b', 'position', 'shift', 'salary', 'image'];
}
