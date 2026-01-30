<?php

namespace App\Models;

// 1. Импорты (Обязательно должны быть)
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// 2. Добавляем implements FilamentUser
class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 3. ВОТ ЭТА ФУНКЦИЯ, КОТОРУЮ ВЫ ЗАБЫЛИ (Она должна быть ВНУТРИ фигурных скобок класса)
    public function canAccessPanel(Panel $panel): bool
    {
        return true; // Разрешаем вход всем (или добавьте проверку email)
    }
}