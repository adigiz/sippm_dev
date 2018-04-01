<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMitra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_mitra',30)->nullable();
            $table->string('cp_mitra',30)->nullable();
            $table->string('jabatan_mitra',30)->nullable();
            $table->string('alamat_mitra',50)->nullable();
            $table->string('telp_mitra',13)->nullable();
            $table->integer('pengajuan_id')->unsigned()->nullable();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans');
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
        Schema::dropIfExists('mitras');
    }
}
