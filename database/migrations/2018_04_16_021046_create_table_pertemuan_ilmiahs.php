<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePertemuanIlmiahs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertemuan_ilmiahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_id')->nullable()->unsigned();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans');
            $table->integer('profil_id')->nullable()->unsigned();
            $table->foreign('profil_id')->references('id')->on('profils');
            $table->string('jenis_pertemuan');
            $table->string('judul_penelitian');
            $table->string('tim_penulis');
            $table->string('nama_kegiatan');
            $table->date('tgl_pelaksanaan');
            $table->string('tempat_pelaksanaan');
            $table->string('penyelenggara');
            $table->text('abstrak');
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
        Schema::dropIfExists('pertemuan_ilmiahs');
    }
}
