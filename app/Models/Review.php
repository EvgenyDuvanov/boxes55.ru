<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'name',
        'info',
        'image',
        'car_model',
        'published',
    ];

    public static function publishedReviews()
    {
        return self::where('published', 1)->get();
    }
}
