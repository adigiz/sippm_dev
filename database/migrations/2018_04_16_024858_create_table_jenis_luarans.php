<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJenisLuarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_luarans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pengajuan_id')->unsigned();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans');
            $table->boolean('jurnal')->nullable();
            $table->boolean('pertemuan_ilmiah')->nullable();
            $table->boolean('haki')->nullable();
            $table->boolean('prototype')->nullable();
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
        Schema::dropIfExists('jenis_luarans');
    }
}
