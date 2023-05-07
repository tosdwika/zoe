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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->bigIncrements('id_lowongan')->unsigned();
            $table->string('posisi');
            $table->text('deskripsi');
            $table->unsignedBigInteger('id_divisi');
            $table->timestamps();
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
        Schema::dropIfExists('lowongan');
    }
};
