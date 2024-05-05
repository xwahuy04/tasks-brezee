<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Buat tabel 'tugas' dengan skema yang ditentukan
        Schema::create('tasks', function (Blueprint $table) {
            // Bidang 'id' kunci utama bertambah secara otomatis
            $table->id();

            // kolom 'konten' untuk menyimpan konten utama tugas
            $table->string('content');

            // kolom 'info_file' untuk menyimpan informasi tentang file terlampir (nullable)    
            $table->string('info_file')->nullable();

            // kolom 'is_completed' untuk melacak apakah tugas sudah selesai atau belum (default: 0)
            $table->unsignedTinyInteger('is_completed')->default(0);

            // kolom 'created_at' dan 'updated_at' untuk menyimpan stempel waktu pembuatan dan pembaruan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel 'tugas' jika ada
        Schema::dropIfExists('tasks');
    }
};
