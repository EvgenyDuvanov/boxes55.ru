<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusContract;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'phone',
        'passport',
        'passport_date',
        'passport_by',
        'address',
        'first_date',
        'last_date',
        'equipment',
        'price',
        'total_days',
        'status',
    ];

    protected $casts = [
        'status' => StatusContract::class,
    ];
}
