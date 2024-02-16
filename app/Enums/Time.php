<?php

namespace App\Enums;

use Rexlabs\Enum\Enum;

/**
 * The Shift enum.
 *
 * @method static self SHIFT_1()
 * @method static self SHIFT_2()
 * @method static self SHIFT_3()
 * @method static self SHIFT_4()
 * @method static self SHIFT_5()
 * @method static self SHIFT_6()
 * @method static self SHIFT_7()
 * @method static self SHIFT_8()
 */
class Time extends Enum
{
    const SHIFT_1 = '8:00-9:00';
    const SHIFT_2 = '9:00-11:00';
    const SHIFT_3 = '11:00-12:00';
    const SHIFT_4 = '13:00-14:00';
    const SHIFT_5 = '14:00-15:00';
    const SHIFT_6 = '15:00-16:00';
    const SHIFT_7 = '16:00-17:00';
    const SHIFT_8 = '17:00-18:00';

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function map() : array
    {
        return [
            static::SHIFT_1 => '8:00-9:00',
            static::SHIFT_2 => '9:00-11:00',
            static::SHIFT_3 => '11:00-12:00',
            static::SHIFT_4 => '13:00-14:00',
            static::SHIFT_5 => '14:00-15:00',
            static::SHIFT_6 => '15:00-16:00',
            static::SHIFT_7 => '16:00-17:00',
            static::SHIFT_8 => '17:00-18:00',
        ];
    }
}
