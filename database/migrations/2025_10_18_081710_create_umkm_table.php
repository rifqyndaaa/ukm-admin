<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('umkm_id'); // BIGINT unsigned auto increment
            $table->string('nama_usaha', 100);
            $table->unsignedBigInteger('pemilik_warga_id');
            $table->string('alamat', 255);
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('kategori', 50)->nullable();
            $table->string('kontak', 50)->nullable();
            $table->text('deskripsi')->nullable();

            // File opsional
            $table->string('foto_usaha')->nullable();
            $table->string('dokumen_izin')->nullable();
            $table->string('banner_promosi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
