<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages\CreateReview;
use App\Filament\Resources\ReviewResource\Pages\EditReview;
use App\Filament\Resources\ReviewResource\Pages\ListReviews;
use App\Models\Review;
use BackedEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationLabel = 'Отзывы';

    protected static ?string $modelLabel = 'отзыв';

    protected static ?string $pluralModelLabel = 'отзывы';

    protected static ?string $recordTitleAttribute = 'author';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('author')
                ->label('Автор')
                ->required()
                ->maxLength(255),
            FileUpload::make('photo')
                ->label('Фото автора')
                ->image()
                ->directory('reviews')
                ->visibility('public')
                ->imagePreviewHeight('120')
                ->maxSize(2048),
            Textarea::make('text')
                ->label('Текст отзыва')
                ->required()
                ->rows(4)
                ->columnSpanFull(),
            DatePicker::make('review_date')
                ->label('Дата отзыва')
                ->native(false)
                ->displayFormat('d.m.Y'),
            Select::make('rating')
                ->label('Оценка')
                ->options([
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                ])
                ->default(5)
                ->required(),
            Toggle::make('is_visible')
                ->label('Опубликовано')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')->label('Фото')->disk('public')->circular()->defaultImageUrl(fn ($record) => 'https://ui-avatars.com/api/?name=' . urlencode($record->author ?? '') . '&size=64'),
                TextColumn::make('author')->label('Автор')->searchable()->sortable(),
                TextColumn::make('text')->label('Текст')->limit(50)->wrap(),
                TextColumn::make('review_date')->label('Дата отзыва')->date('d.m.Y')->sortable(),
                TextColumn::make('rating')->label('Оценка')->badge()->sortable(),
                IconColumn::make('is_visible')
                    ->label('Опубликовано')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('created_at')->label('Создано')->dateTime()->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReviews::route('/'),
            'create' => CreateReview::route('/create'),
            'edit' => EditReview::route('/{record}/edit'),
        ];
    }
}
