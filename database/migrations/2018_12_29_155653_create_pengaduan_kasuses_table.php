<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduanKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan_kasuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kasus')->unsigned();
            $table->integer('id_pengaduan')->unsigned();
            $table->timestamps();

            $table->foreign('id_kasus')->references('id')->on('kasuses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pengaduan')->references('id')->on('pengaduan_masyarakats')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduan_kasuses');
    }
}
