<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePrototype extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prototypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_prototype',30);
            $table->string('judul_penelitian',50);
            $table->string('penulis',150);
            $table->string('gambar');
            $table->date('tanggal');
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
        Schema::dropIfExists('prototypes');
    }
}
