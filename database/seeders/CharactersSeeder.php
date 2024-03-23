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
                'img'=>'https://i.imgur.com/IEYGHwr.png'
            ],
            [  
                'name'=>'goat',
                'img'=>'https://imgur.com/d1XmUwm.png'
            ],
            [  
                'name'=>'chicken',
                'img'=>'https://imgur.com/HTPjQH1.png'
            ],
            [  
                'name'=>'monkey',
                'img'=>'https://imgur.com/HgrM7Ci.png'
            ],

        ]);
    }
}
