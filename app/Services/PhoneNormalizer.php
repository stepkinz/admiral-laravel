<?php

declare(strict_types=1);

namespace App\Services;

final class PhoneNormalizer
{
    /**
     * Нормализует номер телефона до 11 цифр (7XXXXXXXXXX для РФ).
     * Возвращает пустую строку, если цифр меньше 10.
     */
    public static function normalize(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone);
        if ($digits === '') {
            return '';
        }
        if (str_starts_with($digits, '8') && strlen($digits) === 11) {
            $digits = '7' . substr($digits, 1);
        }
        if (strlen($digits) === 10) {
            $digits = '7' . $digits;
        }
        if (str_starts_with($digits, '7') && strlen($digits) === 11) {
            return $digits;
        }
        return strlen($digits) >= 11 ? $digits : '';
    }
}
