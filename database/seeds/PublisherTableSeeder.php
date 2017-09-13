<?php

use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            'name' => 'Blizzard',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('publishers')->insert([
            'name' => 'Ubisoft',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('publishers')->insert([
            'name' => 'Electronic Arts',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
