<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('profil_id')->unsigned();
        $table->foreign('profil_id')->references('id')->on('profils');
        $table->integer('jenis_pengajuan_id')->unsigned();
        $table->foreign('jenis_pengajuan_id')->references('id')->on('jenis_pengajuans');
        $table->string('judul_penelitian');
        $table->longText('abstrak');
        $table->string('jumlah_anggota');
        $table->string('jumlah_lab');
        $table->string('jumlah_mhs');
        $table->string('no_telp');
        $table->string('dana_pribadi');
        $table->string('dana_lain');
        $table->integer('persetujuan_id')->unsigned()->default('3');
        $table->foreign('persetujuan_id')->references('id')->on('jenis_persetujuans');
        $table->string('proposal');
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
        Schema::drop('pengajuans');
    }
}
