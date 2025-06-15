<?php

declare(strict_types=1);

namespace Awcodes\StickyHeader\Tests\Fixtures\Resources\Users\Pages;

use Awcodes\StickyHeader\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
