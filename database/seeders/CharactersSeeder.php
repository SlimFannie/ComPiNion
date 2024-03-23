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
                //'img'=>'https://i.imgur.com/IEYGHwr.png'
                'img'=>'ch_rabbit.png'
            ],
            [  
                'name'=>'goat',
                //'img'=>'https://imgur.com/d1XmUwm.png'
                'img'=>'ch_goat.png'
            ],
            [  
                'name'=>'chicken',
                //'img'=>'https://imgur.com/HTPjQH1.png'
                'img'=>'ch_chicken.png'
            ],
            [  
                'name'=>'monkey',
                //'img'=>'https://imgur.com/HgrM7Ci.png'
                'img'=>'ch_rabbit.png'
            ],

        ]);
    }
}
