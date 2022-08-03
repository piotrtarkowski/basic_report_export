<?php

namespace App\Service;

class ExportHistoryPlaceEnum
{
    public const PLACE_1 = 'Biuro 1';
    public const PLACE_2 = 'Biuro 2';
    public const PLACE_3 = 'Biuro 3';


    public static function getChoiceList(): array
    {
        return [
            self::PLACE_1 => self::PLACE_1,
            self::PLACE_2 => self::PLACE_2,
            self::PLACE_3 => self::PLACE_3,
        ];
    }
}