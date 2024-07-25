<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class Question extends Model 
{
    protected $fillable = ['name', 'phone', 'status', 'comment'];

    protected $casts = [
        'status' => Status::class,
    ];

    /**
     * Получение статса заявки.
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        $statusValue = $this->status->value;

        return Status::select()[$statusValue] ?? 'Неизвестный статус';
    }
}

