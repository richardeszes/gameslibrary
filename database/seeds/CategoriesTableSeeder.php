<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'FPS',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'TPS',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'Strategy',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'MMORPG',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categories')->insert([
            'name' => 'RPG',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
