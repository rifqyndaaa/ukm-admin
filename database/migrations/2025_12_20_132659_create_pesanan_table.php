<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->string('nomor_pesanan')->unique();

            $table->unsignedBigInteger('warga_id');

            $table->decimal('total', 12, 2);
            $table->string('status');
            $table->text('alamat_kirim');
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('metode_bayar');

            $table->timestamps();

            $table->foreign('warga_id')
                  ->references('warga_id')
                  ->on('warga')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
