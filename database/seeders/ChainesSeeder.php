<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DB;

class ChainesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('chaines')->insert([
            [  
                'user_id'=>'1',
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2024-03-16'),
                'end_date'=>now()
            ],
            [  
                'user_id'=>'1',
                'start_date'=>now(),
                'end_date'=>null
            ],
            [  
                'user_id'=>'2',
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2024-03-17'),
                'end_date'=>null
            ],
            [  
                'user_id'=>'3',
                'start_date'=> Carbon::createFromFormat('Y-m-d', '2024-03-21'),
                'end_date'=>null
            ],

        ]);
    }
}
