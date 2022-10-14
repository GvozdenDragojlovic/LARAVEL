<?php

namespace Database\Seeders;

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
        $this->call(tipovi::class);
        $this->call(uredjaji::class);
        $this->call(korisnici::class);
    }
}
