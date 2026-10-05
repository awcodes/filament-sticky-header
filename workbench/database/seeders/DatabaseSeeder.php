<?php

declare(strict_types=1);

namespace Workbench\Database\Seeders;

use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Workbench\Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            'Test User',
            'Amelia Hart',
            'Benjamin Cole',
            'Chloe Bennett',
            'Daniel Reyes',
            'Eleanor Brooks',
            'Felix Navarro',
            'Grace Whitman',
            'Henry Lawson',
            'Isla Moreno',
            'Jack Thornton',
            'Keira Patel',
            'Liam Gallagher',
            'Maya Fischer',
            'Noah Sinclair',
            'Olivia Grant',
            'Patrick Doyle',
            'Quinn Harper',
            'Rosa Delgado',
            'Samuel Price',
            'Tessa Monroe',
            'Umar Siddiqui',
            'Violet Kerr',
            'William Ashby',
            'Xavier Lund',
        ];

        // Fixed users at fixed dates, so documentation screenshots are the same on every build. There are enough
        // of them that the list page scrolls well past its header, which is what makes the header stick.
        foreach ($users as $index => $name) {
            $date = CarbonImmutable::parse('2026-01-01 09:00:00')->addDays($index);

            UserFactory::new()->create([
                'name' => $name,
                'email' => $index === 0 ? 'test@example.com' : str($name)->lower()->replace(' ', '.') . '@example.com',
                'email_verified_at' => $date,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
