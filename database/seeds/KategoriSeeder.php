<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //This resets the table, deleting all the data everytime the function is called.
        Kategori::create([
            'nama' => 'Pendidikan',
            'slug' => 'pendidikan',
            'gambar' => 'hEvIiTYtR8OEgu1BkKBYMTrcjCi70b.jpg'
        ]);
        Kategori::create([
            'nama' => 'Lingkungan Hidup',
            'slug' => 'lingkungan-hidup',
            'gambar' => 'ifmmhYL512m17rHBDupXkz0SiSbiln.jpg'
        ]);
        Kategori::create([
            'nama' => 'Medis & Kesehatan',
            'slug' => 'medis-kesehatan',
            'gambar' => 'vlyv505rHvB5LnJr0MHad6ZeYMaR24.jpg'
        ]);
        Kategori::create([
            'nama' => 'Pembangunan',
            'slug' => 'pembangunan',
            'gambar' => 'LWosA7DDRSEynZGaSHl2NlXezbFLvH.jpg'
        ]);
        Kategori::create([
            'nama' => 'Bencana & Keadaan Darurat',
            'slug' => 'bencana-keadaan-darurat',
            'gambar' => 'lmlEnkqoNvy7ht6rr0BsU5d7oX7UNb.jpg'
        ]);
    }
}
