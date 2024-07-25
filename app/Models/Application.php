<?php

namespace App\Models;

use App\Enums\Status;
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

    protected $casts = [
        'status' => Status::class,
    ];

    /**
     * Получение статуса заявки.
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        $statusValue = $this->status->value;
        
        return Status::select()[$statusValue] ?? 'Неизвестный статус';
    }
}
