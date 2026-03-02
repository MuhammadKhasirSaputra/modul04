<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Data lama (sudah ada)
        Category::create([
            'nama_kategori' => 'Teknologi',
            'deskripsi'     => 'Buku tentang pemrograman dan gadget'
        ]);

        Category::create([
            'nama_kategori' => 'Sains',
            'deskripsi'     => 'Buku ilmu pengetahuan alam'
        ]);

        Category::create([
            'nama_kategori' => 'Sastra',
            'deskripsi'     => 'Novel, puisi, dan prosa'
        ]);

        // Data baru
        Category::create([
            'nama_kategori' => 'Sejarah',
            'deskripsi'     => 'Kisah peristiwa dan peradaban masa lalu'
        ]);

        Category::create([
            'nama_kategori' => 'Psikologi',
            'deskripsi'     => 'Ilmu tentang perilaku dan pikiran manusia'
        ]);

        Category::create([
            'nama_kategori' => 'Bisnis & Ekonomi',
            'deskripsi'     => 'Kewirausahaan, investasi, dan keuangan'
        ]);

        Category::create([
            'nama_kategori' => 'Filsafat',
            'deskripsi'     => 'Pemikiran mendalam tentang kehidupan dan kebenaran'
        ]);

        Category::create([
            'nama_kategori' => 'Kesehatan',
            'deskripsi'     => 'Panduan hidup sehat dan medis'
        ]);

        Category::create([
            'nama_kategori' => 'Agama & Spiritualitas',
            'deskripsi'     => 'Kitab, tafsir, dan pengembangan diri rohani'
        ]);
    }
}