<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\Administrator;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrators = [
            [
                'name' => 'Michiel Elshout',
                'email' => 'info@pixeltijgers.nl',
                'phone' => '+31 (0)6 23 38 47 06',
                'password' => \Hash::make('PXTmichiel2019!'),
            ],
            [
                'name' => 'Demo Gebruiker',
                'email' => 'demo@pixeltijgers.nl',
                'phone' => '+31 (0)6 13 54 22 34',
                'password' => \Hash::make('DemoW8woord'),
            ],
        ];

        foreach($administrators as $administrator) {
            $crAdministrator = Administrator::create($administrator);

            // Add avatar to database.
            $crAdministrator->addMediaFromBase64(\Avatar::create($crAdministrator['name'])->toBase64())
                ->toMediaCollection('avatar');
        }
    }
}
