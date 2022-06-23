<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\NavigationMenu;

class NavigationMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'main'
            ],
            [
                'name' => 'sub-footer'
            ],
            [
                'name' => 'footer'
            ],
            [
                'name' => 'standalone'
            ],
        ];

        foreach($menus as $menu)
            NavigationMenu::create($menu);
    }
}
