<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Import models.
use App\Models\Social;

class SocialSeeder extends Seeder
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
                'social_media_id' => 6,
                'content' => 'https://www.facebook.com/',
            ],
            [
                'social_media_id' => 11,
                'content' => 'https://www.instagram.com/',
            ],
            [
                'social_media_id' => 23,
                'content' => 'https://wa.me/31612345678',
            ],
        ];

        foreach($socials as $social)
            Social::create($social);
    }
}
