<?php

namespace App\Enums;

enum Status: string
{
    case NEW = 'new';
    case IN_PROGRESS = 'in_progress';
    case CLOSED = 'closed';

    public static function select(): array
    {
        return [
            self::NEW->value => 'Новая',
            self::IN_PROGRESS->value => 'В процессе',
            self::CLOSED->value => 'Закрыта',
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::NEW => 'Новая',
            self::IN_PROGRESS => 'В процессе',
            self::CLOSED => 'Закрыта',
        };
    }
}

