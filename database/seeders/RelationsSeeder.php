<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('relations')->insert([
            [    
            'user1_id' => 1,
            'user2_id' => 2,
            'relation' => 'blocked'
            ],
            [
            'user1_id' => 1,
            'user2_id' => 3,
            'relation' => 'friend'
            ],
            [
            'user1_id' => 2,
            'user2_id' => 3,
            'relation' => 'friend'
            ],
            [
            'user1_id' => 4,
            'user2_id' => 3,
            'relation' => 'friend'
            ],
        ]);
    }
}
