<?php

use Illuminate\Database\Seeder;
// use database\seeds\ProfileSeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProfileSeed::class);

    }
}
