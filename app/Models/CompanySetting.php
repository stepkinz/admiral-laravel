<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'address',
        'work_schedule',
        'organizational_legal_form',
        'full_company_name',
        'legal_name',
        'director_name',
        'inn',
        'ogrn',
        'kpp',
        'license_number',
        'bank_name',
        'bik',
        'checking_account',
        'correspondent_account',
    ];

    /**
     * Всегда возвращает единственную запись настроек. Создаёт её при отсутствии.
     */
    public static function getSingleton(): self
    {
        $settings = static::first();
        if ($settings === null) {
            $settings = static::create([]);
        }
        return $settings;
    }
}
