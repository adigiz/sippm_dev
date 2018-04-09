<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfils extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('niph',9);
            $table->string('pangkat',50);
            $table->string('jabatan', 50);
            $table->integer('jurusan_id')->unsigned();
            $table->foreign('jurusan_id')->references('id')->on('jurusans');
            $table->integer('prodi_id')->unsigned();
            $table->foreign('prodi_id')->references('id')->on('prodis');
            $table->string('lab',50);
            $table->string('alamat');
            $table->string('no_telp',16);
            $table->string('avatar')->default('default.jpg');
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
        Schema::dropIfExists('profils');
    }
}
