<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $guarded = [];

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
