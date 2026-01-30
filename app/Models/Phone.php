<?php

declare(strict_types=1);

namespace App\Models;

use App\Services\PhoneNormalizer;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'phone_number',
        'normalized_phone',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Phone $phone): void {
            if ($phone->isDirty('phone_number')) {
                $phone->normalized_phone = PhoneNormalizer::normalize($phone->phone_number) ?: null;
            }
        });
    }
}
