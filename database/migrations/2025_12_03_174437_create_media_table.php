<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');         // PK
            $table->string('ref_table');    // nama tabel referensi
            $table->unsignedBigInteger('ref_id'); // id referensi
            $table->string('file_url');     // lokasi file
            $table->string('caption')->nullable();
            $table->string('mime_type');
            $table->integer('sort_order')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
};
