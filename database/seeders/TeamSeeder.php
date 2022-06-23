<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name'          => 'Savok HS 1',
                'name_short'    => 'HS1'
            ],
            [
                'name'          => 'Savok DS 1',
                'name_short'    => 'DS1'
            ],
            [
                'name'          => 'Savok DS 2',
                'name_short'    => 'DS2'
            ],
            [
                'name'          => 'Savok JB 1',
                'name_short'    => 'JB1'
            ],
            [
                'name'          => 'Savok JC 1',
                'name_short'    => 'JC1'
            ],
            [
                'name'          => 'Savok N5 1',
                'name_short'    => 'N5-1'
            ],
            [
                'name'          => 'Savok N5 2',
                'name_short'    => 'N5-2'
            ],
            [
                'name'          => 'Savok N3 1',
                'name_short'    => 'N3-2'
            ],
            [
                'name'          => 'Savok N2 1',
                'name_short'    => 'N2-1'
            ],
            [
                'name'          => 'Geen team',
                'name_short'    => 'N.v.t.'
            ],
        ];

        foreach($teams as $team)
            Team::create($team);
    }
}
