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
        Schema::create('penimbangans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_balita');
            $table->unsignedBigInteger('id_bulan');
            $table->unsignedBigInteger('id_keterangan');
            $table->double('berat_badan');
            $table->double('tinggi_badan');
            $table->timestamps();
            $table->foreign('id_balita')->references('id')->on('balitas');
            $table->foreign('id_bulan')->references('id')->on('bulans');
            $table->foreign('id_keterangan')->references('id')->on('keterangans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['id_balita']);
        $table->dropForeign(['id_bulan']);
        $table->dropForeign(['id_keterangan']);
        Schema::dropIfExists('penimbangans');
    }
};
