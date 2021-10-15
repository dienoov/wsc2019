<?php

namespace Database\Seeders;

use App\Models\Organizer;
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
        // \App\Models\User::factory(10)->create();

        Organizer::where('slug', 'demo1')->update(['password_hash' => bcrypt('demopass1')]);
        Organizer::where('slug', 'demo2')->update(['password_hash' => bcrypt('demopass2')]);
    }
}
