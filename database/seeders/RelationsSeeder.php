<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RelationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compinions')->insert([
            [    
            'user1' => 1,
            'user2' => 2,
            'relation' => 'block'
            ],
            [
            'user1' => 1,
            'user2' => 3,
            'relation' => 'friend'
            ],
            [
            'user1' => 2,
            'user2' => 3,
            'relation' => 'friend'
            ],
            [
            'user1' => 4,
            'user2' => 3,
            'relation' => 'friend'
            ],
        ]);
    }
}
