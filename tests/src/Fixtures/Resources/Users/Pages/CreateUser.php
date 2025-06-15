<?php

declare(strict_types=1);

namespace Awcodes\StickyHeader\Tests\Fixtures\Resources\Users\Pages;

use Awcodes\StickyHeader\Tests\Fixtures\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
