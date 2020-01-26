<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWaktuPengajuansToPengajuans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            $table->integer('waktu_pengajuan_id')->unsigned()->nullable();
            $table->foreign('waktu_pengajuan_id')->references('id')->on('waktu_pengajuans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuans', function (Blueprint $table) {
            //
        });
    }
}
