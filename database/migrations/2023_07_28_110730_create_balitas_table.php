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
        Schema::create('balitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_orangtua');
            $table->unsignedBigInteger('id_dusun');
            $table->integer('nik_balita');
            $table->string('nama_balita');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->timestamps();
            $table->foreign('id_orangtua')->references('id')->on('orang_tuas');
            $table->foreign('id_dusun')->references('id')->on('dusuns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['id_orangtua']);
        $table->dropForeign(['id_dusun']);
        Schema::dropIfExists('balitas');
    }
};
