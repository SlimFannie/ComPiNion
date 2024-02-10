<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CompinionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *   Schema::create('compinions', function (Blueprint $table) {
     *       $table->id()->autoIncrement();
     *       $table->foreignId('user_id')->constrained();
     *       $table->string('nom');
     *       $table->string('img')->nullable();
     *       $table->integer('jours')->default(0);
     *       $table->integer('experience')->default(0);
     *       $table->integer('merite')->default(0);
     *       $table->timestamps();
     *   });
     */
    public function run(): void
    {
        DB::table('compinions')->insert([
            [
                 
            'user_id' => 1,
            'nom' => 'Rocky',
            ],
            [
            'user_id' => 2,
            'nom' => 'Apollo',
            ],
            [
            'user_id' => 3,
            'nom' => 'Clubber',
            ],
            [
            'user_id' => 4,
            'nom' => 'Drago',
            ]
        ]);
    }
}
