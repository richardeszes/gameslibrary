<?php

use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'title' => 'World of Warcraft',
            'console_id' => 3,
            'publisher_id' => 1,
            'category_id' => 4,
            'published' => '2000-01-01',
            'url' => 'http://battle.net/',
            'coverimage' => null,
            'metagamescore' => 86,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('games_tags')->insert([
            'game_id' => 1,
            'tag_id' => 1,
        ]);
        DB::table('games_tags')->insert([
            'game_id' => 1,
            'tag_id' => 2,
        ]);
        DB::table('games')->insert([
            'title' => "Assassin's Creed: Origins",
            'console_id' => 1,
            'publisher_id' => 2,
            'category_id' => 1,
            'published' => '2006-01-01',
            'url' => 'http://ubisoft.com/',
            'coverimage' => null,
            'metagamescore' => 79,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('games_tags')->insert([
            'game_id' => 2,
            'tag_id' => 2,
        ]);
        DB::table('games')->insert([
            'title' => "SWTOR",
            'console_id' => 3,
            'publisher_id' => 3,
            'category_id' => 1,
            'published' => '2004-08-21',
            'url' => 'http://swtor.com/',
            'coverimage' => null,
            'metagamescore' => 79,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('games_tags')->insert([
            'game_id' => 3,
            'tag_id' => 3,
        ]);
        DB::table('games')->insert([
            'title' => "Sims 4",
            'console_id' => 3,
            'publisher_id' => 3,
            'category_id' => 3,
            'published' => '2012-09-01',
            'url' => '',
            'coverimage' => null,
            'metagamescore' => 79,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('games_tags')->insert([
            'game_id' => 4,
            'tag_id' => 4,
        ]);
    }
}
