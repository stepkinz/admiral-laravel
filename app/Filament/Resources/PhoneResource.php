<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PhoneResource\Pages\CreatePhone;
use App\Filament\Resources\PhoneResource\Pages\EditPhone;
use App\Filament\Resources\PhoneResource\Pages\ListPhones;
use App\Models\Phone;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PhoneResource extends Resource
{
    protected static ?string $model = Phone::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Номера телефонов';

    protected static ?string $modelLabel = 'номер телефона';

    protected static ?string $pluralModelLabel = 'номера телефонов';

    protected static ?string $recordTitleAttribute = 'phone_number';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('phone_number')
                ->label('Номер телефона')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->placeholder('+7 (800) 500-29-01')
                ->columnSpanFull(),
            Textarea::make('description')
                ->label('Описание')
                ->rows(3)
                ->placeholder('Назначение номера или дополнительная информация')
                ->columnSpanFull(),
            Toggle::make('is_active')
                ->label('Активен')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('phone_number')
                    ->label('Номер телефона')
                    ->searchable()
                    ->sortable()
                    ->fontFamily('mono'),
                TextColumn::make('description')
                    ->label('Описание')
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Добавлен')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('phone_number');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPhones::route('/'),
            'create' => CreatePhone::route('/create'),
            'edit' => EditPhone::route('/{record}/edit'),
        ];
    }
}
