<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $table = 'sets';

    protected $fillable = ['name', 'price_3_days', 'price_over_3_days'];
}
