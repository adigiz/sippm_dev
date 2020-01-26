<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWaktuPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_pengajuans', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal_buka');
            $table->time('waktu_buka');
            $table->date('tanggal_tutup');
            $table->time('waktu_tutup');
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
        Schema::dropIfExists('waktu_pengajuans');
    }
}
