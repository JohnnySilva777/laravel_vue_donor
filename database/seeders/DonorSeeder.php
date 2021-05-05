<?php

namespace Database\Seeders;

use App\Models\Donor;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class DonorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizationIds = array();
        $faker = Faker::create();
        $numberOfUsers = 10;
        $numberOfOrganization = 10;
        for ($i = 0; $i < $numberOfOrganization; $i++) {
            $organization = Organization::create([
                'name' => $faker->name(),
                'description' => $faker->paragraph(3, true),
            ]);
            array_push($organizationIds, $organization->id);
        }

        for($i = 0; $i<$numberOfUsers; $i++){
            Donor::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'favorite_organization_id' => $organizationIds[random_int(0,$numberOfOrganization-1)],
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
