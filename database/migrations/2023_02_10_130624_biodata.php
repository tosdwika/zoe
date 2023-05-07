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
        Schema::create('biodata', function (Blueprint $table) {
            $table->bigIncrements('id_biodata')->unsigned();
            $table->string('nama');
            $table->BigInteger('no_ktp')->unsigned();
            $table->string('tempat_lahir');
            $table->dateTime('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('golongan_darah');
            $table->string('status_kawin');
            $table->string('alamat_ktp');
            $table->string('alamat_tinggal');
            $table->string('email');
            $table->string('no_telp');
            $table->string('orang_terdekat');
            $table->string('skill');
            $table->boolean('roaming');
            $table->string('gaji');
            $table->dateTime('tanggal_pendaftaran')->useCurrent();
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
        Schema::dropIfExists('biodata');        
    }
};
