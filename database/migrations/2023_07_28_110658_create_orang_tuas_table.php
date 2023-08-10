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
        Schema::create('orang_tuas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dusun');
            $table->integer('nik_bapak');
            $table->integer('nik_ibu');
            $table->string('nama_bapak');
            $table->string('nama_ibu');
            $table->timestamps();
            $table->foreign('id_dusun')->references('id')->on('dusuns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['id_dusun']);
        Schema::dropIfExists('orang_tuas');
    }
};
