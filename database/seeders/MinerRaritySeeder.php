<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MinerRaritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('miners')->insert([
            'rarity' => 'common',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('miners')->insert([
            'rarity' => 'rare',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('miners')->insert([
            'rarity' => 'ultra rare',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('miners')->insert([
            'rarity' => 'legendary',
            'created_at' => now(),
            'updated_at' => now(),
            ]);
    }
}
