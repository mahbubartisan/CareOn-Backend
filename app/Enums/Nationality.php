<?php

namespace App\Enums;

enum Nationality: string
{
    case Bangladeshi = 'Bangladeshi';
    case Non_Bangladeshi      = 'Non-Bangladeshi';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}