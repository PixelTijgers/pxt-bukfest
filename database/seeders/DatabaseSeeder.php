<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Administrator seeders.
            AdministratorSeeder::class,
            AdministratorPermissionsSeeder::class,
            TeamSeeder::class,
            MembershipSeeder::class,

            // Navigation seeders.
            NavigationMenuSeeder::class,
            Menu\MainSeeder::class,
            Menu\FooterSeeder::class,
            Menu\StandAloneSeeder::class,

            // Website seeders.
            CategorySeeder::class,
            DetailsSeeder::class,
            LocaleSeeder::class,
            //PageSliderSeeder::class,

            // Social media seeder.
            SocialMediaSeeder::class,
            SocialSeeder::class,
        ]);

        // Only run factories on local or staging env.
        if (\App::environment(['local', 'staging'])) {

            // Call factories.
            \App\Models\Board::factory()->count(10)->create();
            \App\Models\Calendar::factory()->count(100)->create();
            \App\Models\Client::factory()->count(25)->create();
            \App\Models\Invoice::factory()->count(100)->create();
            \App\Models\InvoiceRule::factory()->count(500)->create();
            \App\Models\Member::factory()->count(250)->create();
            \App\Models\Post::factory()->count(150)->create();
            \App\Models\Sponsor::factory()->count(25)->create();

        }
    }
}
