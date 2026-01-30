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
class EditCompanySettings extends Page
{
    use CanUseDatabaseTransactions;

    /**
     * @var array<string, mixed>|null
     */
    public ?array $data = [];

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-building-office';

    protected static ?string $navigationLabel = 'Реквизиты';

    protected static ?string $title = 'Реквизиты компании';

    protected string $view = 'filament-panels::pages.page';

    protected static bool $shouldRegisterNavigation = true;

    public static function getNavigationLabel(): string
    {
        return 'Реквизиты';
    }

    public static function getNavigationIcon(): BackedEnum|string|null
    {
        return 'heroicon-o-building-office';
    }

    public function getTitle(): string|Htmlable
    {
        return static::$title ?? 'Реквизиты компании';
    }

    public function mount(): void
    {
        $settings = CompanySetting::getSingleton();
        $this->form->fill($settings->toArray());
    }

    public function submit(): void
    {
        try {
            $this->beginDatabaseTransaction();

            $this->callHook('beforeValidate');

            $data = $this->form->getState();

            $this->callHook('afterValidate');
            $this->callHook('beforeSave');

            $settings = CompanySetting::first();
            if ($settings === null) {
                $settings = CompanySetting::create($data);
            } else {
                $settings->update($data);
            }

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
            ->title('Реквизиты сохранены')
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
            Section::make('Контакты')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('phone')
                        ->label('Телефон в шапке')
                        ->tel()
                        ->maxLength(255),
                    \Filament\Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->maxLength(255),
                    \Filament\Forms\Components\Textarea::make('address')
                        ->label('Адрес')
                        ->rows(3)
                        ->columnSpanFull(),
                    \Filament\Forms\Components\TextInput::make('work_schedule')
                        ->label('Режим работы')
                        ->placeholder('Например: Пн–Пт 9:00–18:00')
                        ->maxLength(255)
                        ->columnSpanFull(),
                ])
                ->columns(2),
            Section::make('Юридические данные')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('organizational_legal_form')
                        ->label('Организационно-правовая форма')
                        ->placeholder('Общество с ограниченной ответственностью')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    \Filament\Forms\Components\Textarea::make('full_company_name')
                        ->label('Полное наименование предприятия')
                        ->placeholder('ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ КОЛЛЕКТОРСКАЯ ОРГАНИЗАЦИЯ «АДМИРАЛ»')
                        ->rows(2)
                        ->columnSpanFull(),
                    \Filament\Forms\Components\TextInput::make('legal_name')
                        ->label('Краткое наименование предприятия')
                        ->placeholder('ООО «ПКО «АДМИРАЛ»')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    \Filament\Forms\Components\TextInput::make('director_name')
                        ->label('Генеральный директор')
                        ->maxLength(255),
                    \Filament\Forms\Components\TextInput::make('inn')
                        ->label('ИНН')
                        ->maxLength(255),
                    \Filament\Forms\Components\TextInput::make('ogrn')
                        ->label('ОГРН')
                        ->maxLength(255),
                    \Filament\Forms\Components\TextInput::make('kpp')
                        ->label('КПП')
                        ->maxLength(255),
                    \Filament\Forms\Components\TextInput::make('license_number')
                        ->label('Номер лицензии')
                        ->placeholder('№ 4170044007468')
                        ->maxLength(255)
                        ->columnSpanFull(),
                ])
                ->columns(2),
            Section::make('Банковские реквизиты')
                ->schema([
                    \Filament\Forms\Components\TextInput::make('bank_name')
                        ->label('Название банка')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    \Filament\Forms\Components\TextInput::make('bik')
                        ->label('БИК')
                        ->maxLength(255),
                    \Filament\Forms\Components\TextInput::make('checking_account')
                        ->label('Расчётный счёт')
                        ->maxLength(255)
                        ->columnSpanFull(),
                    \Filament\Forms\Components\TextInput::make('correspondent_account')
                        ->label('Корреспондентский счёт')
                        ->maxLength(255)
                        ->columnSpanFull(),
                ])
                ->columns(2),
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
