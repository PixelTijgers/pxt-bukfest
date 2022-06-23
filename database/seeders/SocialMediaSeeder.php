<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Import models.
use App\Models\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [
            [
                'name' => '500px',
                'icon' => 'fab fa-500px'
            ],
            [
                'name' => 'Behance',
                'icon' => 'fab fa-behance'
            ],
            [
                'name' => 'Behance (Alt.)',
                'icon' => 'fab fa-behance-square'
            ],
            [
                'name' => 'Dribble',
                'icon' => 'fab fa-dribbble'
            ],
            [
                'name' => 'Dribble (Alt.)',
                'icon' => 'fab fa-dribbble-square'
            ],
            [
                'name' => 'Facebook',
                'icon' => 'fab fa-facebook'
            ],
            [
                'name' => 'Facebook (Rond)',
                'icon' => 'fab fa-facebook-f'
            ],
            [
                'name' => 'Facebook (Alt.)',
                'icon' => 'fab fa-facebook-square'
            ],
            [
                'name' => 'Flickr',
                'icon' => 'fab fa-flickr'
            ],
            [
                'name' => 'Instagram',
                'icon' => 'fab fa-instagram'
            ],
            [
                'name' => 'Instagram (Alt.)',
                'icon' => 'fab fa-instagram-square'
            ],
            [
                'name' => 'Snapchat',
                'icon' => 'fab fa-snapchat-ghost'
            ],
            [
                'name' => 'Snapchat (Rond)',
                'icon' => 'fab fa-snapchat'
            ],
            [
                'name' => 'Snapchat (Alt.)',
                'icon' => 'fab fa-snapchat-square'
            ],
            [
                'name' => 'Spotify',
                'icon' => 'fab fa-spotify'
            ],
            [
                'name' => 'Tumblr',
                'icon' => 'fab fa-tumblr'
            ],
            [
                'name' => 'Tumblr (Alt.)',
                'icon' => 'fab fa-tumblr-square'
            ],
            [
                'name' => 'Twitch',
                'icon' => 'fab fa-twitch'
            ],
            [
                'name' => 'Twitter',
                'icon' => 'fab fa-twitter'
            ],
            [
                'name' => 'Twitter (Alt.)',
                'icon' => 'fab fa-twitter-square'
            ],
            [
                'name' => 'Vimeo',
                'icon' => 'fab fa-vimeo-v'
            ],
            [
                'name' => 'Vimeo (Alt.)',
                'icon' => 'fab fa-vimeo-v-square'
            ],
            [
                'name' => 'Whatsapp',
                'icon' => 'fab fa-whatsapp'
            ],
            [
                'name' => 'Whatsapp (Alt.)',
                'icon' => 'fab fa-whatsapp-square'
            ],
            [
                'name' => 'Youtube',
                'icon' => 'fab fa-youtube'
            ],
            [
                'name' => 'Youtube (Alt)',
                'icon' => 'fab fa-youtube-square'
            ],
        ];

        foreach($socials as $social)
            SocialMedia::create($social);
    }
}
