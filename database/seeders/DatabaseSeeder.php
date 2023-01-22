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
        $this->call(CategoriesTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TimesTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(LikesTableSeeder::class);
    }
}
