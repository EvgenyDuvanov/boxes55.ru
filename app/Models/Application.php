<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 
        'phone', 
        'car_model', 
        'equipment', 
        'first_date', 
        'last_date', 
        'price', 
        'status'
    ];

}
