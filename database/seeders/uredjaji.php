<?php

namespace Database\Seeders;

use App\Models\Uredjaj;
use Illuminate\Database\Seeder;

class uredjaji extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++){
            Uredjaj::create([
                'vlasnik' => $faker->name,
                'serviser' => $faker->name,
                'popravljen' => rand(0,1),
                'cena' => rand(10,50),
                'tipId' => rand(1,3)
            ]);
        }
    }
}
