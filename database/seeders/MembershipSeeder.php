<?php

// Namespacing.
namespace Database\Seeders;

// Facades
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models.
use App\Models\Membership;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $memberships = [
            [
                'name' => 'Competitielid',
                'contribution' => 150.000,
                'contribution_first_half' => 100.000,
                'contribution_second_half' =>50.000,
            ],
            [
                'name' => 'Jeugdlid',
                'contribution' => 75.000,
                'contribution_first_half' => 40.000,
                'contribution_second_half' => 35.000,
            ],
            [
                'name' => 'Niet spelend lid',
                'contribution' => 0.000,
                'contribution_first_half' => 0.000,
                'contribution_second_half' =>0.000,
            ],
        ];

        foreach($memberships as $membership)
            Membership::create($membership);
    }
}
