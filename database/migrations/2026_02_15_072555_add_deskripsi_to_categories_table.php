<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Menambah kolom deskripsi setelah nama_kategori
            $table->text('deskripsi')->nullable()->after('nama_kategori');
        });
    }

    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // Menghapus kolom jika di-rollback
            $table->dropColumn('deskripsi');
        });
    }
};
