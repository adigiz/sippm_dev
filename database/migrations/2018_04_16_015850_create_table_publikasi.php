<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePublikasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_id')->nullable()->unsigned();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans');
            $table->integer('profil_id')->nullable()->unsigned();
            $table->foreign('profil_id')->references('id')->on('profils');
            $table->string('issn',20);
            $table->string('jenis_jurnal');
            $table->string('judul_penelitian');
            $table->string('tim_penulis');
            $table->string('nama_jurnal');
            $table->string('volume');
            $table->string('no_jurnal');
            $table->string('halaman');
            $table->text('abstrak');
            $table->string('bukti');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publikasis');
    }
}
