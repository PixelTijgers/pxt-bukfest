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

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'page_title' => 'Home',
                'menu_title' => 'Home',
                'slug' => '/',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi erat libero, rhoncus vel convallis et, hendrerit in lorem. Fusce pulvinar eget libero sed congue. Ut at ex vestibulum, eleifend libero nec, egestas ipsum. Donec sed ultricies libero, in varius arcu. Maecenas sodales mauris risus, eget bibendum quam lacinia ut. Etiam vitae diam eget est vehicula pellentesque eu dignissim mi. Maecenas et iaculis massa, quis rutrum mauris. Nunc pharetra tortor in tellus efficitur, in aliquam purus dignissim.</p>',

                'meta_title' => 'Home',
                'meta_description' => 'Sed a dolor libero. Curabitur euismod, nunc ut interdum pretium, quam diam cursus lectus, a pellentesque nisi justo vulputate sapien.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Home',
                'og_description' => 'Sed a dolor libero. Curabitur euismod, nunc ut interdum pretium, quam diam cursus lectus, a pellentesque nisi justo vulputate sapien.',
                'og_slug' => '/',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Expertises',
                'menu_title' => 'Expertises',
                'slug' => '/expertises',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Expertises',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Expertises',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/expertises',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',

                'children' => [
                    [
                        'page_title' => 'Webdevelopment',
                        'menu_title' => 'Webdevelopment',
                        'slug' => '/webdevelopment',
                        'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Webdevelopment',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Webdevelopment',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/webdevelopment',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                    [
                        'page_title' => 'Grafisch vormgeving',
                        'menu_title' => 'Grafisch vormgeving',
                        'slug' => '/grafisch-vormgeving',
                        'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Grafisch vormgeving',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Grafisch vormgeving',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/grafisch-vormgeving',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                    [
                        'page_title' => 'Drukwerk',
                        'menu_title' => 'Drukwerk',
                        'slug' => '/drukwerk',
                        'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Drukwerk',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Drukwerk',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/drukwerk',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                    [
                        'page_title' => 'Video en animatie',
                        'menu_title' => 'Video en animatie',
                        'slug' => '/video-en-animatie',
                        'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                        'content' => '<p>Dit is een stuk tekst.</p>',

                        'meta_title' => 'Video en animatie',
                        'meta_description' => 'Dit is een stuk tekst.',
                        'meta_tags' => 'Website, Webdesign, Design',

                        'og_title' => 'Video en animatie',
                        'og_description' => 'Dit is een stuk tekst.',
                        'og_slug' => '/video-en-animatie',
                        'og_type' => 'website',
                        'og_locale' => 'nl_NL',

                        'status' => PublishedState::Published,
                        'published_at' => now(),

                        'last_edited_administrator_id' => 1,
                        'last_edit_at' => now(),
                    ],
                ]
            ],
            [
                'page_title' => 'Over Pixeltijgers',
                'menu_title' => 'Over Pixeltijgers',
                'slug' => '/over-pixeltijgers',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Over Pixeltijgers',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Over Pixeltijgers',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/over-pixeltijgers',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
            [
                'page_title' => 'Contact',
                'menu_title' => 'Contact',
                'slug' => '/contact',
                'caption' => '<p>Lorem ipsum dolor sit amet.</p>',
                'content' => '<p>Dit is een stuk tekst.</p>',

                'meta_title' => 'Contact',
                'meta_description' => 'Dit is een stuk tekst.',
                'meta_tags' => 'Website, Webdesign, Design',

                'og_title' => 'Contact',
                'og_description' => 'Dit is een stuk tekst.',
                'og_slug' => '/contact',
                'og_type' => 'website',
                'og_locale' => 'nl_NL',
            ],
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
            $createPage->navigation_menus()->sync([1]);

        }
    }
}
