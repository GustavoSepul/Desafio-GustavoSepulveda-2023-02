<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gustavo',
            'email' => 'sparki.maco@gmail.com',
            'password' => Hash::make('Tavowalker'),
        ]);
        DB::table('singers')->insert([
            'nombre' => 'Shakira',
            'anio_nacimiento' => 1977,
            'pais_id' => 48,
            'imagen' => NULL
        ]);
        DB::table('singers')->insert([
            'nombre' => 'Paramore',
            'anio_nacimiento' => 2005,
            'pais_id' => 1,
            'imagen' => NULL
        ]);
        DB::table('singers')->insert([
            'nombre' => 'Bruno Mars',
            'anio_nacimiento' => 1985,
            'pais_id' => 1,
            'imagen' => NULL
        ]);
        DB::table('singers')->insert([
            'nombre' => 'Linkin Park',
            'anio_nacimiento' => 1996,
            'pais_id' => 1,
            'imagen' => NULL
        ]);
        DB::table('singers')->insert([
            'nombre' => 'Metallica',
            'anio_nacimiento' => 1983,
            'pais_id' => 1,
            'imagen' => NULL
        ]);
        DB::table('singers')->insert([
            'nombre' => 'Avenged Sevenfold',
            'anio_nacimiento' => 1999,
            'pais_id' => 1,
            'imagen' => NULL
        ]);
        DB::table('genders')->insert([
            'nombre' => 'Rock',
        ]);
        DB::table('genders')->insert([
            'nombre' => 'Pop',
        ]);
        DB::table('genders')->insert([
            'nombre' => 'Punk',
        ]);
        DB::table('genders')->insert([
            'nombre' => 'R&B',
        ]);
        DB::table('genders')->insert([
            'nombre' => 'Alternative',
        ]);
        DB::table('albums')->insert([
            'titulo' => 'All We Know is Falling',
            'singer_id' => 2,
            'anio' => 2005,
            'caratula' => NULL
        ]);
        DB::table('albums')->insert([
            'titulo' => 'After Laugther',
            'singer_id' => 2,
            'anio' => 2018,
            'caratula' => NULL
        ]);
        DB::table('albums')->insert([
            'titulo' => 'Riot!',
            'singer_id' => 2,
            'anio' => 2005,
            'caratula' => NULL,
        ]);
        DB::table('albums')->insert([
            'titulo' => 'Laundry Service',
            'singer_id' => 1,
            'anio' => 2005,
            'caratula' => NULL,
        ]);
        DB::table('albums')->insert([
            'titulo' => '24K Magic',
            'singer_id' => 3,
            'anio' => 2005,
            'caratula' => NULL,
        ]);
        DB::table('albums')->insert([
            'titulo' => 'Meteora',
            'singer_id' => 4,
            'anio' => 2003,
            'caratula' => NULL,
        ]);
        DB::table('songs')->insert([
            'titulo' => 'All We Know',
            'album_id' => 1,
            'gender_id' => 3,
            'anio' => 2000,
            'caratula' => NULL,
            'audio' => NULL,
        ]);
        DB::table('songs')->insert([
            'titulo' => 'Hard Times',
            'album_id' => 2,
            'gender_id' => 2,
            'anio' => 2018,
            'caratula' => NULL,
            'audio' => NULL,
        ]);
        DB::table('songs')->insert([
            'titulo' => 'Suerte',
            'album_id' => NULL,
            'gender_id' => 2,
            'anio' => 2018,
            'caratula' => NULL,
            'audio' => NULL,
        ]);
        DB::table('songs')->insert([
            'titulo' => 'Decode',
            'album_id' => NULL,
            'gender_id' => 1,
            'anio' => 2008,
            'caratula' => NULL,
            'audio' => NULL,
        ]);
        DB::table('songs')->insert([
            'titulo' => 'Numb',
            'album_id' => 6,
            'gender_id' => 1,
            'anio' => 2003,
            'caratula' => NULL,
            'audio' => NULL,
        ]);
        DB::table('singers_songs')->insert([
            'singer_id' => 2,
            'song_id' => 1,
        ]);
        DB::table('singers_songs')->insert([
            'singer_id' => 2,
            'song_id' => 2,
        ]);
        DB::table('singers_songs')->insert([
            'singer_id' => 2,
            'song_id' => 3,
        ]);
        DB::table('singers_songs')->insert([
            'singer_id' => 1,
            'song_id' => 4,
        ]);
        DB::table('singers_songs')->insert([
            'singer_id' => 4,
            'song_id' => 5,
        ]);
    }
}
