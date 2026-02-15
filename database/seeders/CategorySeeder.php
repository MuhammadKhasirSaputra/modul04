<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
public function run()
{
    // Data 1
    Category::create([
        'nama_kategori' => 'Teknologi',
        'deskripsi'     => 'Buku tentang pemrograman dan gadget'
    ]);

    // Data 2
    Category::create([
        'nama_kategori' => 'Sains',
        'deskripsi'     => 'Buku ilmu pengetahuan alam'
    ]);

    // Data 3
    Category::create([
        'nama_kategori' => 'Sastra',
        'deskripsi'     => 'Novel, puisi, dan prosa'
    ]);
}
}
