<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SocialNetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<5; $i++)
            DB::table('socialNetworks')->insert([
                'tipo'   => $faker->randomElement(["Youtube", "Facebook", "Twitter","Instagram"]),
                'url'     => $faker->url(),
                'user_id' => 1,
            ]);
    }
}
