<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ConsultationStatus;

class Question extends Model
{
    protected $fillable = ['name', 'phone', 'status', 'comment'];

    protected $casts = [
        'status' => ConsultationStatus::class,
    ];

    /**
     * Получить отображаемое значение статуса.
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        // Получаем строковое значение из перечисления
        $statusValue = $this->status->value;
        
        // Проверяем, существует ли значение статуса в массиве
        return ConsultationStatus::select()[$statusValue] ?? 'Неизвестный статус';
    }
}

