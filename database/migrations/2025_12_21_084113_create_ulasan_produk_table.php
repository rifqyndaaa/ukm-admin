<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ulasan_produk', function (Blueprint $table) {
            $table->id('ulasan_id');

            $table->unsignedBigInteger('produk_id');
            $table->unsignedBigInteger('pelanggan_id'); // tetap bisa ada kolom ini

            $table->tinyInteger('rating');
            $table->text('komentar')->nullable();

            $table->timestamps();

            // foreign key untuk produk tetap ada
            $table->foreign('produk_id')
                  ->references('produk_id')
                  ->on('produks')
                  ->cascadeOnDelete();

            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasan_produk');
    }
};
