<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'Orc',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tags')->insert([
            'name' => 'Warrior',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tags')->insert([
            'name' => 'Jedi',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('tags')->insert([
            'name' => 'Simulation',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
