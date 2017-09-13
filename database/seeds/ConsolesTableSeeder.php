<?php

use Illuminate\Database\Seeder;

class ConsolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consoles')->insert([
            'name' => 'Sony PlayStation 3',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('consoles')->insert([
            'name' => 'Xbox 360',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('consoles')->insert([
            'name' => 'PC',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
