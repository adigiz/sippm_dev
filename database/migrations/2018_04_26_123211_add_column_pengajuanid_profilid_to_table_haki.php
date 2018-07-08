<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPengajuanidProfilidToTableHaki extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hakis', function (Blueprint $table) {
            $table->integer('pengajuan_id')->nullable()->unsigned();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans');
            $table->integer('profil_id')->nullable()->unsigned();
            $table->foreign('profil_id')->references('id')->on('profils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hakis', function (Blueprint $table) {
            $table->integer('pengajuan_id')->nullable()->unsigned();
            $table->foreign('pengajuan_id')->references('id')->on('pengajuans');
            $table->integer('profil_id')->nullable()->unsigned();
            $table->foreign('profil_id')->references('id')->on('profils');
        });
    }
}
