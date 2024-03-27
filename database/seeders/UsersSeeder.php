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
            'merite' =>5,
            'limite' => 1,
            ],
            [
            'nom' => 'Aidoun',
            'prenom' => 'Lyes',
            'pseudo' => 'Kk0lt',
            'admin' => true,
            'email' => 'laidoun@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 2,
            'merite' =>6,
            'limite' => 3,
            ],
            [
            'nom' => 'Leao-Belzile',
            'prenom' => 'Cédric',
            'pseudo' => 'CedXComa',
            'admin' => true,
            'email' => 'cleaobelzile@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 3,
            'merite' =>2,
            'limite' => 2
            ],
            [
            'nom' => 'Des Ruisseaux',
            'prenom' => 'Thomas',
            'pseudo' => 'Woopser',
            'admin' => true,
            'email' => 'tdesruisseaux@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 4,
            'merite' =>9,
            'limite' => 0,
            ],
            [
            'nom' => 'Harti',
            'prenom' => 'Yassine',
            'pseudo' => 'D4rkS4suk3',
            'admin' => false,
            'email' => 'yharti@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 3,
            'merite' => 24,
            'limite' => 1,
            ],
            [
            'nom' => 'Deschamps',
            'prenom' => 'Valérie',
            'pseudo' => 'QueenVal',
            'admin' => false,
            'email' => 'vdeschamps@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 2,
            'merite' => 15,
            'limite' => 2,
            ],
            [
            'nom' => 'Héroux',
            'prenom' => 'Philippe',
            'pseudo' => 'Poot',
            'admin' => false,
            'email' => 'pheroux@hotmail.fr',
            'password' => Hash::make('Password123'),
            'character_id' => 1,
            'merite' => 6,
            'limite' => 3,
            ],
            [
            'nom' => 'Légaré',
            'prenom' => 'Maxenze',
            'pseudo' => 'MaZe',
            'admin' => false,
            'email' => 'mlegare@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 1,
            'merite' => 2,
            'limite' => 3,
            ],
            [
            'nom' => 'Bunny',
            'prenom' => 'Bugs',
            'pseudo' => 'LapinMalin',
            'admin' => false,
            'email' => 'bbunny@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 1,
            'merite' => 6,
            'limite' => 3,
            ],
            [
            'nom' => 'Routine',
            'prenom' => 'Madame',
            'pseudo' => 'CoolPseudo57',
            'admin' => false,
            'email' => 'mroutine@hotmail.com',
            'password' => Hash::make('Password123'),
            'character_id' => 4,
            'merite' => 14,
            'limite' => 3,
            ]
        ]);
    }
}
