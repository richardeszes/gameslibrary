<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@localhost.dev',
            'password' => bcrypt('secret'),
        ]);

        $this->call(CategoriesTableSeeder::class);
        $this->call(ConsolesTableSeeder::class);
        $this->call(PublisherTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(GamesTableSeeder::class);
    }
}
