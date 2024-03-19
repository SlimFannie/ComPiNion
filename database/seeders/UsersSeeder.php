<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Schema::create('users', function (Blueprint $table) {
     *       $table->id()->autoIncrement();
     *       $table->string('nom');
     *       $table->string('prenom');
     *       $table->string('pseudo');
     *       $table->boolean('admin')->default(false);
     *       $table->string('email')->unique();
     *       $table->timestamp('email_verified_at')->nullable();
     *       $table->string('password');
     *       $table->rememberToken();
     *       $table->timestamps();
     *   });
     * 
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'nom' => 'Hamel Thibault',
            'prenom' => 'Fannie',
            'pseudo' => 'SlimFannie',
            'admin' => true,
            'email' => 'fhamelthibault@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 1,
            'jours' => 2,
            'merite' =>5,
            'limite' => 1,
            ],
            [
            'nom' => 'Aidoun',
            'prenom' => 'Lyes',
            'pseudo' => 'Kk0lt',
            'admin' => true,
            'email' => 'culmarde@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 2,
            'jours' => 1,
            'merite' =>6,
            'limite' => 3,
            ],
            [
            'nom' => 'Leao-Belzile',
            'prenom' => 'Cédric',
            'pseudo' => 'CedXComa',
            'admin' => false,
            'email' => 'ok@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 3,
            'jours' => 3,
            'merite' =>2,
            'limite' => 2
            ],
            [
            'nom' => 'Des Ruisseaux',
            'prenom' => 'Thomas',
            'pseudo' => 'Woopser',
            'admin' => false,
            'email' => 'woopdidoo@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 4,
            'jours' => 7,
            'merite' =>9,
            'limite' => 0,
            ]
        ]);
    }
}
