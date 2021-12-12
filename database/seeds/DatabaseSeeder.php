<?php

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
        $this->call([
            RestaurantsTypesTableSeeder::class,
            UsersTableSeeder::class,
            PlatesTypeTableSeeder::class,
            PlatesTableSeeder::class,
            OrdersTableSeeder::class,
        ]);
    }
}
