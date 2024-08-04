<?php

namespace App\Enums;

enum StatusContract: string
{
    case NEW = 'new';
    case MODERATION = 'moderation';
    case APPROVED = 'approved';
    case REFUSAL = 'refusal';
    case IN_PROGRESS = 'in_progress';
    case CLOSED = 'closed';

    public static function select(): array
    {
        return [
            self::NEW->value => 'Создан', 
            self::MODERATION->value => 'На рассмотрении',
            self::APPROVED->value => 'Одобрен',
            self::REFUSAL->value => 'Не одобрен',
            self::IN_PROGRESS => 'В процессе',
            self::CLOSED->value => 'Закрыт',
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::NEW->value => 'Создан',
            self::MODERATION->value => 'На рассмотрении',
            self::APPROVED->value => 'Одобрен',
            self::REFUSAL->value => 'Не одобрен',
            self::IN_PROGRESS => 'В процессе',
            self::CLOSED->value => 'Закрыт',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
