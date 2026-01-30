<?php

declare(strict_types=1);

namespace App\Filament\Resources\PhoneResource\Pages;

use App\Filament\Resources\PhoneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPhone extends EditRecord
{
    protected static string $resource = PhoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
