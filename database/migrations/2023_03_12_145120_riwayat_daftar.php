<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_daftar', function (Blueprint $table) {
            $table->bigIncrements('id_riwayat_daftar')->unsigned();
            $table->unsignedBigInteger('id_biodata');
            $table->unsignedBigInteger('id_lowongan');
            $table->unsignedBigInteger('id_divisi');
            $table->dateTime('tanggal_daftar')->useCurrent();
            $table->foreign('id_biodata')->references('id_biodata')->on('biodata')->onDelete('cascade')->onUpdate('cascade');    
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan')->onDelete('cascade')->onUpdate('cascade');    
            $table->foreign('id_divisi')->references('id_divisi')->on('divisi')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_daftar');        
    }
};
