<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class tipovi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tip::create([
            'tip' => 'Mobilni telefon'
        ]);

        Tip::create([
            'tip' => 'Laptop'
        ]);

        Tip::create([
            'tip' => 'Konzola'
        ]);
    }
}
