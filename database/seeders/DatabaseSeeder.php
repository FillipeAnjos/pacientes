<?php

namespace Database\Seeders;
use App\Models\AdmModel;

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
        AdmModel::factory(5)->create();
        // \App\Models\User::factory(10)->create();
    }
}
