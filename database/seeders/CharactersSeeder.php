<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CharactersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('characters')->insert([
            [  
                'name'=>'rabbit',
                'img'=>'ch_rabbit.png'
            ],
            [  
                'name'=>'goat',
                'img'=>'ch_goat.png'
            ],
            [  
                'name'=>'chicken',
                'img'=>'ch_chicken.png'
            ],
            [  
                'name'=>'monkey',
                'img'=>'ch_monkey.png'
            ],

        ]);
    }
}
