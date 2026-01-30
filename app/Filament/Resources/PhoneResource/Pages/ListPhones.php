<?php

declare(strict_types=1);

namespace App\Filament\Resources\PhoneResource\Pages;

use App\Filament\Resources\PhoneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPhones extends ListRecords
{
    protected static string $resource = PhoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
