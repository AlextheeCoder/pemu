<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    use HasFactory;
    protected $fillable = ['fullname', 'idnumber', 'phonenumber', 'crops','area','operator','gender','dob']; 
}