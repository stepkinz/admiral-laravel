<?php

namespace App\Filament\Pages;

use App\Models\CompanySetting;
use BackedEnum;
use Illuminate\Support\Facades\Cache;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\CanUseDatabaseTransactions;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\Alignment;
use Filament\Support\Exceptions\Halt;
use Illuminate\Contracts\Support\Htmlable;
use Throwable;

/**
 * @property-read Schema $form
 */
class EditSeoSettings extends Page
{
    use CanUseDatabaseTransactions;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-magnifying-glass-circle';

    protected static ?string $navigationLabel = 'SEO';

    protected static ?string $title = 'Настройки SEO';

    protected string $view = 'filament-panels::pages.page';

    protected static bool $shouldRegisterNavigation = true;

    public static function getNavigationLabel(): string
    {
        return 'SEO';
    }

    public static function getNavigationIcon(): BackedEnum|string|null
    {
        return 'heroicon-o-magnifying-glass-circle';
    }

    public function getTitle(): string|Htmlable
    {
        return static::$title ?? 'Настройки SEO';
    }

    public function mount(): void
    {
        $settings = CompanySetting::getSingleton();
        $this->form->fill([
            'meta_title' => $settings->meta_title,
            'meta_description' => $settings->meta_description,
            'seo_text' => $settings->seo_text,
        ]);
    }

    public function submit(): void
    {
        try {
            $this->beginDatabaseTransaction();

            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');
            $this->callHook('beforeSave');

            $settings = CompanySetting::getSingleton();
            $settings->update([
                'meta_title' => $data['meta_title'] ?? null,
                'meta_description' => $data['meta_description'] ?? null,
                'seo_text' => $data['seo_text'] ?? null,
            ]);

            $this->callHook('afterSave');
        } catch (Halt $exception) {
            $this->rollBackDatabaseTransaction();

            return;
        } catch (Throwable $exception) {
            $this->rollBackDatabaseTransaction();

            throw $exception;
        }

        $this->commitDatabaseTransaction();

        Cache::forget('company_settings');

        Notification::make()
            ->title('Настройки SEO сохранены')
            ->success()
            ->send();
    }

    public function defaultForm(Schema $schema): Schema
    {
        return $schema->statePath('data');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Мета-теги')
                ->description('Используются по умолчанию на всех страницах сайта. Яндекс и Google показывают их в результатах поиска.')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('meta_title')
                        ->label('Meta Title')
                        ->placeholder('Заголовок вкладки и поисковой выдачи (до 70 символов)')
                        ->maxLength(70)
                        ->columnSpanFull(),
                    \Filament\Forms\Components\Textarea::make('meta_description')
                        ->label('Meta Description')
                        ->placeholder('Краткое описание для сниппета в поиске (до 160 символов)')
                        ->rows(2)
                        ->maxLength(512)
                        ->columnSpanFull(),
                ])
                ->columns(1),
            Section::make('SEO-текст')
                ->description('Дополнительный текст для поисковиков. Выводится внизу главной страницы.')
                ->schema([
                    \Filament\Forms\Components\RichEditor::make('seo_text')
                        ->label('Текст')
                        ->placeholder('Введите блок текста (о компании, услугах) для индексации')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    /**
     * @return array<Action|ActionGroup>
     */
    protected function getFormActions(): array
    {
        return [
            Action::make('submit')
                ->label('Сохранить')
                ->submit('submit')
                ->keyBindings(['mod+s']),
        ];
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            $this->getFormContentComponent(),
        ]);
    }

    protected function getFormContentComponent(): Component
    {
        return Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('submit')
            ->footer([
                Actions::make($this->getFormActions())
                    ->alignment(Alignment::Start)
                    ->key('form-actions'),
            ]);
    }
}
