<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Review extends Model
{
    protected $guarded = [];

    protected $appends = ['photo_url'];

    protected function casts(): array
    {
        return [
            'is_visible' => 'boolean',
            'review_date' => 'date',
        ];
    }

    public function getPhotoUrlAttribute(): ?string
    {
        $photo = $this->attributes['photo'] ?? $this->photo ?? null;
        if (empty($photo) || !is_string($photo)) {
            return null;
        }
        $path = ltrim(str_replace('\\', '/', $photo), '/');
        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, 8);
        }
        return Storage::disk('public')->url($path);
    }
}
