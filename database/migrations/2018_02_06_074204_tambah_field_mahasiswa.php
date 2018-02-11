<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TambahFieldMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('mahasiswas', function($table) {
            $table->unsignedInteger('id_dosen')->after('nim')->nullable();
            $table->foreign('id_dosen')->references('id')->on('dosens')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('mahasiswas', function($table) {
            $table->dropColumn('id_dosen');
        });
    }
}
