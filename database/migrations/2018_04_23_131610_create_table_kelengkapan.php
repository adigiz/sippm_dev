<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelengkapan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelengkapans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_id')->nullable()->unsigned();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans');
            $table->string('laporan')->nullable();
            $table->string('laporan2')->nullable();
            $table->string('logbook')->nullable();
            $table->string('presentasi')->nullable();
            $table->string('output')->nullable();
            $table->string('spj')->nullable();
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
        Schema::dropIfExists('kelengkapans');
    }
}
