<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MahasiswaHobi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_hobi', function(Blueprint $table)
{
    $table->increments('id');

    $table->unsignedInteger('id_mahasiswa');
    $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')->onDelete('CASCADE');
    $table->unsignedInteger('id_hobi');
    $table->foreign('id_hobi')->references('id')->on('hobis')->onDelete('CASCADE');

});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
