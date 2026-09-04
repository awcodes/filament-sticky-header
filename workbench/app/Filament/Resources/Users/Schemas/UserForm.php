<?php

declare(strict_types=1);

namespace Workbench\App\Filament\Resources\Users\Schemas;

use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    /** @throws Exception */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('job_title')
                    ->default('Product Designer')
                    ->dehydrated(false),
                TextInput::make('company')
                    ->default('Acme Studio')
                    ->dehydrated(false),
                TextInput::make('phone')
                    ->default('(555) 867-5309')
                    ->dehydrated(false),
                TextInput::make('website')
                    ->default('https://example.com')
                    ->dehydrated(false),
                TextInput::make('street_address')
                    ->default('123 Main Street')
                    ->dehydrated(false),
                TextInput::make('city')
                    ->default('Philadelphia')
                    ->dehydrated(false),
                TextInput::make('state')
                    ->default('Pennsylvania')
                    ->dehydrated(false),
                TextInput::make('postal_code')
                    ->default('19106')
                    ->dehydrated(false),
                TextInput::make('country')
                    ->default('United States')
                    ->dehydrated(false),
                TextInput::make('department')
                    ->default('Design')
                    ->dehydrated(false),
                TextInput::make('manager')
                    ->default('Taylor Smith')
                    ->dehydrated(false),
                TextInput::make('employee_number')
                    ->default('EMP-00142')
                    ->dehydrated(false),
                TextInput::make('timezone')
                    ->default('America/New_York')
                    ->dehydrated(false),
                TextInput::make('preferred_language')
                    ->default('English')
                    ->dehydrated(false),
                TextInput::make('emergency_contact')
                    ->default('Morgan Example')
                    ->dehydrated(false),
                TextInput::make('emergency_phone')
                    ->default('(555) 555-0199')
                    ->dehydrated(false),
                TextInput::make('notes')
                    ->default('Workbench-only content for testing the sticky header while scrolling.')
                    ->columnSpanFull()
                    ->dehydrated(false),
            ]);
    }
}
