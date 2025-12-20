<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->string('nomor_pesanan')->unique();

            // FK ke warga (PK = warga_id)
            $table->unsignedBigInteger('warga_id');

            $table->decimal('total', 12, 2);
            $table->string('status');
            $table->text('alamat_kirim');
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('metode_bayar');

            $table->timestamps();

            // ✅ FOREIGN KEY BENAR
            $table->foreign('warga_id')
                  ->references('warga_id')
                  ->on('warga')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
