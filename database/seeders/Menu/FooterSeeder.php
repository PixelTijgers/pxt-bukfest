<?php

// Namespacing.
namespace Database\Seeders\Menu;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\Page;

// Enums
use App\Enums\PublishedState;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
        ];

        foreach($pages as $page) {

            // Create page in the database.
            $createPage = Page::create([
                    'status' => PublishedState::Published,
                    'published_at' => now(),

                    'last_edited_administrator_id' => 1,
                    'last_edit_at' => now(),
                ] + $page);

            // Sync with the navigation menu.
            $createPage->navigation_menus()->sync([4]);

        }
    }
}
