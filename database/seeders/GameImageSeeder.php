<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameImageSeeder extends Seeder
{
    public function run()
    {
        DB::table('games')->where('id', 1)->update(['image' => 'images/game1.jpg']);
        DB::table('games')->where('id', 2)->update(['image' => 'images/game2.jpg']);
        DB::table('games')->where('id', 3)->update(['image' => 'images/game3.jpg']);
        DB::table('games')->where('id', 4)->update(['image' => 'images/game4.jpg']);
        DB::table('games')->where('id', 5)->update(['image' => 'images/game5.jpg']);
        DB::table('games')->where('id', 6)->update(['image' => 'images/game6.jpg']);
        DB::table('games')->where('id', 7)->update(['image' => 'images/game7.jpg']);
        DB::table('games')->where('id', 8)->update(['image' => 'images/game8.jpg']);
        DB::table('games')->where('id', 9)->update(['image' => 'images/game9.jpg']);
        DB::table('games')->where('id', 10)->update(['image' => 'images/game10.jpg']);
        DB::table('games')->where('id', 11)->update(['image' => 'images/game11.jpg']);
        DB::table('games')->where('id', 12)->update(['image' => 'images/game12.jpg']);
        DB::table('games')->where('id', 13)->update(['image' => 'images/game13.jpg']);
        DB::table('games')->where('id', 14)->update(['image' => 'images/game14.jpg']);
        DB::table('games')->where('id', 15)->update(['image' => 'images/game15.jpg']);
        DB::table('games')->where('id', 16)->update(['image' => 'images/game16.jpg']);
        DB::table('games')->where('id', 17)->update(['image' => 'images/game17.jpg']);
        DB::table('games')->where('id', 18)->update(['image' => 'images/game18.jpg']);
        DB::table('games')->where('id', 19)->update(['image' => 'images/game19.jpg']);
        DB::table('games')->where('id', 20)->update(['image' => 'images/game20.jpg']);
    }
}