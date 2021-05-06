<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $numberOfOrganization = 1;
        for ($i = 0; $i < $numberOfOrganization; $i++) {
            Organization::create([
                'name' => $faker->name(),
                'description' => $faker->paragraph(3, true),
            ]);
        }
    }
}
