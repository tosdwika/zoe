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
        Schema::create('pengalaman', function (Blueprint $table) {
            $table->bigIncrements('id_pengalaman')->unsigned();
            $table->string('nama_perusahaan');
            $table->string('posisi_terakhir');
            $table->integer('gaji_terakhir');
            $table->string('tahun');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengalaman');        
    }
};
